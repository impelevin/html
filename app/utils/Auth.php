<?php

namespace Utils;

class Auth extends Session
{
    const AUTH_KEY = 'logged_username';

    public function check(): bool
    {
        return !! $this->find(self::AUTH_KEY);
    }

    public static function change(string|null $value): void
    {
        self::set(self::AUTH_KEY, $value);
    }

}