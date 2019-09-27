<?php

namespace Core;

class Core
{
    public function run()
    {
        require("src/routes.php");

        $url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
        $routes_info = Router::get($url);
        extract($routes_info);
        $class_name = "\\Controller\\" . ucfirst($controller) . "Controller";

        if(class_exists($class_name))
        {
            $user = new $class_name($action);
        }
    }
}

?>