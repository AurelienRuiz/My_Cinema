<?php

namespace Controller;

class AppController extends \Core\Controller
{
    public function __construct($action)
    {
        new \Core\Request();

        if($action == "index" )
        {
            $this->indexAction();
        }
        else
        {
            echo "Error 404";
        }
    }
    
    public function indexAction()
    {
        $this->render("index", ["title" => "Home", "css" => "webroot/css/style.css"]);
    }
}
?>