<?php
session_start();
require_once './Config/Config.php';
require_once './vendor/autoload.php';

use App\Libraries\Route;

$app = new Route();