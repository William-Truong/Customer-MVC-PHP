<?php

namespace App\Controllers;

use App\Libraries\Role;
use App\Libraries\Helpers;

class SignUpController extends Controller
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
            $this->view('admin/signup');
        } elseif ($this->method == 'POST') {
            $result = $this->model->createAccount($_POST);
            if ($result) {
                Role::set_logged($_POST['name'], $_POST['level']);
                Helpers::redirect('dashboard');
            } else {
                $message = "Can't not sign up!";
                $this->view('admin/signup', ['message' => $message]);
            }
        }
    }
}