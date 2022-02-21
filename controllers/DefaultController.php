<?php
/**
 * Created by PhpStorm.
 * User: sahar
 * Date: 08.11.2019
 * Time: 18:44
 */

namespace controllers;


abstract class DefaultController
{

    public function loadView($view, $variables = [])
    {
        $viewPath = "../views/{$view}.php";
        extract($variables);
        ob_start();
        require_once $viewPath;
        return ob_get_clean();
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }

}