<?php
session_start();
require_once 'config/config.php';
require_once 'helpers/helpers.php';
$libraries = ['Route', 'Model', 'Role', 'Session', 'Controller'];
foreach ($libraries as $lib) {
    require_once 'libraries/' . $lib . '.php';
}
$route = new Route();