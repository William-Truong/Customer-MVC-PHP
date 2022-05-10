<?php

namespace App\Libraries;

use App\Config\Config as config;

class Role
{
    // Hàm thiết lập là đã đăng nhập
    public static function set_logged($username, $level)
    {
        Session::session_set(config::SESSION_USER_TOKEN, array(
            'username' => $username,
            'level' => $level
        ));
    }

    // Hàm thiết lập đăng xuất
    public static function set_logout()
    {
        Session::session_delete(config::SESSION_USER_TOKEN);
    }

    // Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
    public static function is_logged()
    {
        $user = Session::session_get(config::SESSION_USER_TOKEN);
        return $user;
    }
    // Hàm kiểm tra có phải là admin hay không
    public static function is_admin()
    {
        $user  = self::is_logged();
        if (!empty($user['level']) && $user['level'] == '1') {
            return true;
        }
        return false;
    }
}