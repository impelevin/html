<?php

namespace Utils;

class OldFormData extends Session
{
    const OLD_FORM_DATA_KEY = 'old_form_data';

    public function get(): ?array
    {
        return $this->find(self::OLD_FORM_DATA_KEY);
    }

    public static function save(array $data): void
    {
        self::set(self::OLD_FORM_DATA_KEY, $data);
    }

    public static function clear(): void
    {
        self::set(self::OLD_FORM_DATA_KEY, null);
    }

}