<?php

namespace App\Libraries;

use App\Controllers;
use App\Libraries\Role;

class Route
{
    private $controller;
    private $action = 'index';
    private $params = [];
    public function __construct()
    {
        $url = $this->getUrl();

        // CONTROLLER
        if (!isset($url[0])) {
            $url[0] = 'Dashboard';
        }

        if (file_exists('./Controllers/' . ucwords($url[0]) . 'Controller' . '.php')) {

            // If exists, set as controller
            $this->controller = ucwords($url[0] . 'Controller');

            // Unset 0 Index
            unset($url[0]);

            //Nếu chưa đăng nhập và không phải vào link signup thì điều hướng đến login
            if (!Role::is_logged() && $this->controller != "SignUpController") {
                $this->controller = "LoginController";
            }

            // Đăng xuất tài khoản trước khi đến /SignUp
            if ($this->controller == "SignUpController" && Role::is_logged()) {
                Role::set_logout();
            }

            // Require the controller
            require_once './Controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        } else {
            // If not exists, show error
            exit("<h1 style='text-align:center;font-size:50px; color: red;'>404 PAGE NOT FOUND!</h1>");
        }

        // Action
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            } else {
                echo "Not found action!";
            }
        }

        // Params
        // Get params
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}