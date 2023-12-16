<?php

namespace Utils;

class Session
{
    private array $session;

    public function __construct()
    {
        $this->session = $_SESSION;
    }

    protected function find(string $key)
    {
        return $this->session[$key] ?? null;
    }

    protected static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
}