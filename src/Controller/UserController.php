<?php

namespace Controller;

session_start();

class UserController extends \Core\Controller
{
    public $request;

    public function __construct($action)
    {
        $this->request = new \Core\Request();

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

    // AFFICHAGE DES VIEW AVEC RENDER

    public function registerView()
    {
        if(!empty($_POST))
        {
            $this->registerAction();
        }
        else
        {
            $this->render("register", ["title" => "Inscription", "css" => "webroot/css/style.css"]);
        }
    }

    public function loginView()
    {
        if(!empty($_POST))
        {
            $this->loginAction();
        }
        else
        {
            $this->render("login", ["title" => "Connexion", "css" => "webroot/css/style.css"]);
        }
    }

    public function showView()
    {
        if(isset($_SESSION['id']))
        {
            if(!empty($_POST))
            {
                $this->showAction();
            }
            else
            {
                $this->render("show", ["title" => "Show", "css" => "webroot/css/style.css"]);
            }
        }
        else
        {
            header("Location: login");
        }
    }

    public function logoutView()
    {
        $this->logoutAction();
    }

    // TRAITEMENT DES FORMULAIRES

    public function registerAction()
    {
        $register = new \Model\UserModel($this->request->getQueryParams());
        $register->register();
        header("Location: login");
    }

    public function loginAction()
    {
        $login = new \Model\UserModel($this->request->getQueryParams());
        $info_login = $login->login();

        if($info_login["error"] == false)
        {
            header("Location: search");
        }
        else
        {
            echo $info_login["error_message"];
        }
    }

    public function showAction()
    {
        $update = new \Model\UserModel($this->request->getQueryParams());
        if(isset($_POST["update"]))
        {
            $update->update();
            header("Location: show");
        }
        else
        {
            $update->delete();
            session_destroy();
            header("Location: ./");
        }
    }

    public function logoutAction()
    {
        session_destroy();
        header("Location: ./");
    }
}

?>