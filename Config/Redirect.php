<?php

class Redirect extends Session
{
    public static function to($url)
    {
        header("Location: $url");
        exit();
    }

    public static function back()
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $referer");
        exit();
    }

    public static function with($key, $value)
    {
        static::start();
        static::set("flash_data.$key", $value);
    }

    public static function getFlashData($key)
    {
        static::start();
        $value = static::get("flash_data.$key");
        static::delete("flash_data.$key");
        return $value;
    }
}