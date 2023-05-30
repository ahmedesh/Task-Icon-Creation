<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $userRepository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function showIndexUser()
    {
//        return response()->json([
//            'data' => $this->orderRepository->getAllOrders()
//        ]);
        $users = $this->userRepository->getAllUsers();
//dd($users);
        return view('users', ['users' => $users]);
    }

}
