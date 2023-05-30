<?php

namespace App\RepositoryInterface;

interface UsersRepositoryInterface
{
    public function getUserByEmail($email);
    public function checkCredentials($user, $password);
    public function register(array $data);
    public function login(array $credentials);
    public function updateLoginAttempts($user , $attempts);
    public function checkUserActivation($userEmail);
    public function updateUserActive($userEmail, $columnActive, $activeValue);
    public function logout();
    public function getAllUsers();



}
