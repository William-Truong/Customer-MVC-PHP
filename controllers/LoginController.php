<?php

namespace App\Controllers;

use App\Libraries\Role;
use App\Libraries\Helpers;

class LoginController extends Controller
{
    private $method;
    private $model;
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->model = $this->loadModel('AccountModel');
    }
    public function index()
    {
        if ($this->method == 'GET') {
            if (Role::is_logged())
                Helpers::redirect("Dashboard");
            else
                $this->view('admin/login');
        } elseif ($this->method == 'POST') {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $account = $this->model->getAccount($username, $password);
            if ($account == null) {
                $message = "Your userName or password is incorrect !";
                $this->view('admin/login', ['message' => $message]);
            } else {
                Role::set_logged($account['name'], $account['level']);
                $this->view('dashboard');
            }
        }
    }
}