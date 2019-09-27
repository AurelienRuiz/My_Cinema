<?php

namespace Controller;

class ErrorController extends \Core\Controller
{
    public function __construct($action)
    {

        $method_name = $action . "View";
        if(method_exists($this, $method_name))
        {
            $this->$method_name();
        }
        else
        {
            echo "ERROR 404";
        }
    }
    public function notFoundView()
    {
        $this->render("404");
    }

}

?>