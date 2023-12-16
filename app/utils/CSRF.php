<?php

namespace Utils;

class CSRF extends Session
{
    const CSRF_KEY = 'csrf_key';

    public function token(): string|null
    {
        return $this->find(self::CSRF_KEY);
    }

    public function check(?string $csrfToken): bool
    {
        return $csrfToken && hash_equals($this->token(), $csrfToken);
    }

    public static function store(): void
    {
        self::set(self::CSRF_KEY, bin2hex(random_bytes(32)));
    }

}