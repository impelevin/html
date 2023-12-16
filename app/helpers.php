<?php

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        $keys = explode('.', $key);

        $configFileName = array_shift($keys);
        $configFilePath = __DIR__."/../config/$configFileName.php";

        if (!file_exists($configFilePath))
            return $default;

        $config = include $configFilePath;

        foreach ($keys as $innerKey) {
            if (isset($config[$innerKey]))
                $config = $config[$innerKey];
            else
                return $default;
        }

        return $config;
    }
}

if (!function_exists('url')) {
    function url(string $path = '', array $params = [])
    {
        $url = config('app.url').$path;

        if ($params)
            $url .= '?' . http_build_query($params);

        return $url;
    }
}

if (!function_exists('flashMessage')) {
    function flashMessage()
    {
        return (new \Utils\FlashMassages())->get();
    }
}

if (!function_exists('isAuth')) {
    function isAuth()
    {
        return (new \Utils\Auth)->check();
    }
}