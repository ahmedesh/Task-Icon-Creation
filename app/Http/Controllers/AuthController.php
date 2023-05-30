<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function showLoginForm()
    {
        return view('Auth.login');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    // call the function in the appropriate place

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->userRepository->register($request->all());

        // Perform any additional actions or redirections after successful registration

        return redirect()->route('home')->with('success', 'Registration successful');
    }

    // this refreshes page after 4 seconds
    public function login(Request $request)
    {
         session()->put('login_attempts', 0);
        $login_attempts = 0;
//        $login_attempts = session('login_attempts', 0);
//        $login_attempts = session()->get('login_attempts');

        $credentials = $request->only(['email', 'password']);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = $this->userRepository->getUserByEmail($credentials['email']);

        if ($this->userRepository->login($credentials) && $this->userRepository->checkUserActivation($request->email)) {
                // Perform any additional actions or redirections after successful login
            session()->put('login_attempts', 0);
                return redirect()->intended('home');
            }
//        elseif (!$this->userRepository->login($credentials) ) {
        elseif ($user && !$this->userRepository->checkCredentials($user, $credentials['password'])) {

            $attempts = $user->login_attempts + 1;
//            die($time);
            if ($attempts == 3) {
                    sleep(30);
                    $user->login_attempts = 0;
                    $user->save();
                return redirect()->back()->with('error_message', 'You have exceeded the number of allowed login_attempts. Please try again after 30 seconds.');
            }
            elseif ($attempts >= 4) {
                $this->userRepository->updateUserActive($request->email, 'active', 2); // disable
                return redirect()->back()->with('error_message', 'Your account has been blocked');
            }
            $this->userRepository->updateLoginAttempts($user, $attempts);
            return redirect()->back();
        }
         elseif(!$this->userRepository->login($credentials)) {
             return redirect()->back()->with('error_message', 'Invalid email credential.');
         }
        else{
            return redirect()->back()->with('error_message', 'Your account has been blocked');
        }
    }

    public function logout()
    {
        $this->userRepository->logout();

        // Perform any additional actions or redirections after logout

        return redirect()->route('login');

    }

}
