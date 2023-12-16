<?php

namespace Utils;

class Request
{
    private array $request;

    public function __construct()
    {
        $this->request = array_merge($_POST, $_GET);
    }

    public function find(string $key)
    {
        return $this->request[$key] ?? null;
    }

    public function only(array $keys): array
    {
        $response = [];

        foreach ($keys as $key) {
            $response[$key] = $this->find($key);
        }

        return $response;
    }
}