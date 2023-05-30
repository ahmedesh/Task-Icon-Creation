<?php

namespace App\Repositories;

use App\Models\User;
use App\RepositoryInterface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UsersRepository implements UsersRepositoryInterface
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

//    public function login(string $email, string $password): bool
//    {
//        $user = $this->users->where('email', $email)->first();
//
//        if ($user && $user->password === $password) {
//            return true;
//        }
//
//        return false;
//    }
    public function getUserByEmail($email) {
        return User::where('email', $email)->first();
    }
    public function checkCredentials($user, $password) {
        return Hash::check($password, $user->password);
    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
    public function updateLoginAttempts($user, $attempts) {
        //        $user = User::where('email', $userEmail)->where('active', 1)->first();
        $user->login_attempts = $attempts;
        $user->save();
    }

    public function checkUserActivation($userEmail)
    {
        return User::where('email', $userEmail)->where('active', 1)->first();
    }
    public function updateUserActive($userEmail, $columnActive, $activeValue)
    {
        $user = User::where('email', $userEmail)->first();
        if($user) {
            $user->active = $activeValue;
            $user->save();
        }
        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }
    public function getAllUsers()
    {
        return User::orderBy('id' , 'desc')->get();

//        return User::orderBy('created_at', 'desc')->get();
    }

}
