<?php

namespace App\Libraries;

use App\Config\Config as config;

class Helpers
{
    // Hàm redirect
    public static function redirect($url)
    {
        header("Location:" . config::ROOT_URL . $url);
        exit();
    }

    // Hàm lấy value từ $_POST
    public static function input_post($key)
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : false;
    }

    // Hàm lấy value từ $_GET
    public static function input_get($key)
    {
        return isset($_GET[$key]) ? trim($_GET[$key]) : false;
    }

    // Hàm kiểm tra submit
    public static function is_submit($key)
    {
        return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
    }
}