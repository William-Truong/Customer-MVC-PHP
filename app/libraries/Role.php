<?php
class Role
{
    // Hàm thiết lập là đã đăng nhập
    public static function set_logged($username, $level)
    {
        Session::session_set('ss_user_token', array(
            'username' => $username,
            'level' => $level
        ));
    }

    // Hàm thiết lập đăng xuất
    public static function set_logout()
    {
        Session::session_delete('ss_user_token');
    }

    // Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
    public static function is_logged()
    {
        $user = Session::session_get('ss_user_token');
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