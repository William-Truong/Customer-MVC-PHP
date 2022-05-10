<?php
session_start();
require_once 'config.php';
require_once 'controllers/Controller.php';
require_once 'models/Model.php';
$libraries = ['Route', 'Role', 'Session', 'Helpers'];
foreach ($libraries as $lib) {
    require_once 'libraries/' . $lib . '.php';
}
$route = new Route();