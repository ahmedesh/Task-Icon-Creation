<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RepositoryInterface\DeviceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $deviceRepository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $devices = $this->deviceRepository->getUserDevices($user->id);
            if (count($devices) >= 2) {
                Auth::logout();
                return response()->json(['message' => 'You\'re logged in from two devices.']);
            } else {
                $this->deviceRepository->addDevice($user->id, $request->id);
                return response()->json(['message' => 'Login successful.']);
            }
        } else {
            return response()->json(['message' => 'Invalid email/password.']);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $this->deviceRepository->removeDevice($user->id, $request->id);
        Auth::logout();
        return response()->json;
    }
}
