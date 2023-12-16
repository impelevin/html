<?php

namespace Utils;

class FlashMassages extends Session
{
    const FLASH_KEY = 'flash';
    const SUCCESS = 'success';
    const ERROR = 'danger';

    public function get()
    {
        return $this->find(self::FLASH_KEY);
    }

    public static function clear()
    {
        self::set(self::FLASH_KEY, null);
    }

    public static function push(string $type, string $message): void
    {
        self::set(self::FLASH_KEY, ['type' => $type, 'message' => $message]);
    }
}