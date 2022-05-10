<?php

namespace App\Controllers;

class Controller
{
    public function loadModel($model)
    {
        //Require model file
        require_once './Models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    //Load the view (checks for the file)
    public function view($view, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        if (file_exists('./Views/' . $view . '.php'))
            require_once './Views/' . $view . '.php';
        else
            die("View does not exists.");
    }
}