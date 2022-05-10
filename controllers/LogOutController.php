<?php

namespace App\Controllers;

use App\Libraries\Role;
use App\Libraries\Helpers;

class LogOutController extends Controller
{
    function __construct()
    {
        Role::set_logout();
    }
    function index()
    {
        Helpers::redirect('Login');
    }
}