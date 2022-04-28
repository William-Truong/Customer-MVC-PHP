<?php
class Route
{
    protected $controller;
    protected $action = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->getUrl();

        // CONTROLLER
        if (!isset($url[0])) {
            $url[0] = 'Dashboard';
        }

        if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller' . '.php')) {

            // If exists, set as controller
            $this->controller = ucwords($url[0] . 'Controller');

            // Unset 0 Index
            unset($url[0]);

            //Check logged if not yet then redirect to login
            if (!Role::is_logged() && $this->controller != "SignUpController") {
                $this->controller = "LoginController";
            }

            // Require the controller
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        } else {
            // If not exists, show error
            echo "<h1 style='text-align:center;font-size:50px; color: red;'>PAGE NOT FOUND!</h1>";
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