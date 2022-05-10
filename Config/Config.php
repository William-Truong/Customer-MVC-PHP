<?php
define('ROOT_DIR', dirname(dirname(__FILE__)));
define('ROOT_URL', 'http://localhost/Customer-MVC-PHP/');
define("DB_HOST", 'localhost');
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", 'customer_management');
define("SESSION_USER_TOKEN", 'ss_user_token');
define("CONTROLLERS", ["Controller", "DashboardController", "LoginController", "SignUpController", "LogOutController", "CustomersController"]);