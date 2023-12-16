<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Utils\Auth;

class User
{
    const USERNAME = 'admin';
    const PASSWORD = '123';

    public function attempt(array $credentials): bool
    {
        $validCredentials = $this->getValidCredentials();

        return $validCredentials['username'] === $credentials['username'] &&
            password_verify($credentials['password'], $validCredentials['password']);
    }

    public function login(array $credentials)
    {
        Auth::change($credentials['username']);
    }

    public function logout()
    {
        Auth::change(null);
    }

    private function getValidCredentials()
    {
        return [
            'username' => self::USERNAME,
            'password' => password_hash(self::PASSWORD, PASSWORD_DEFAULT)
        ];
    }
}