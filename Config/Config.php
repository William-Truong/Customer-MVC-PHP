<?php

namespace App\Config;

define('ROOT_DIR2', dirname(dirname(__FILE__)));

class Config
{
    const ROOT_URL = 'http://localhost/Customer-MVC-PHP/';
    const ROOT_DIR = ROOT_DIR2;
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'customer_management';
    const SESSION_USER_TOKEN = 'ss_user_token';
}