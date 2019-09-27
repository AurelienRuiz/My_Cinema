<?php

namespace Core;

class Controller
{
    protected static $_render;

    protected function render($view, $scope = [])
    {
        extract($scope); // Transforme tableau en variables : array("color" => "blue") deviens $color; $color = blue; 
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', str_replace('\\', '', basename(get_class($this)))), $view]) . '.php';

        if (file_exists($f))
        {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
            echo self::$_render;
        }
    }
}

?>