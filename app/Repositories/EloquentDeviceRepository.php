<?php

namespace App\Repositories;

use App\Models\Device;
use App\Models\User;
use App\RepositoryInterface\DeviceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
//use Your Model

/**
 * Class UserRepository.
 */
class EloquentDeviceRepository implements DeviceRepository
{
    public function addDevice($userId, $deviceId) {
        $device = new Device();
        $device->user_id = $userId;
        $device->id = $deviceId;
        $device->save();
    }

    public function removeDevice($userId, $deviceId) {
        Device::where('user_id', $userId)
            ->where('id', $deviceId)
            ->delete();
    }

    public function getUserDevices($userId) {
        return Device::where('user_id', $userId)->pluck('id')->toArray();
    }

}
