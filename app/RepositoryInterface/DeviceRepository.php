<?php

namespace App\RepositoryInterface;

interface DeviceRepository
{
    public function addDevice($userId, $deviceId);
    public function removeDevice($userId, $deviceId);
    public function getUserDevices($userId);
}
