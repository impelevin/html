<?php

namespace Utils;

class Response
{
    public function redirect($path)
    {
        header('Location: '.url($path));
        exit();
    }

    public function back()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }
}