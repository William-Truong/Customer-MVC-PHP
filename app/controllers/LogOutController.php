<?php
class LogOutController extends Controller
{
    function __construct()
    {
        Role::set_logout();
    }
    function index()
    {
        Helper::redirect('Login');
    }
}