<?php

namespace Controller;

session_start();

class FilmController extends \Core\Controller
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

    public function searchView()
    {
        if(isset($_POST["search"]))
        {
            $this->render("search", ["title" => "Rechercher", "css" => "webroot/css/style.css", "films" => $this->searchAction(), "years" => $this->yearsAction()]);
        }
        elseif(isset($_POST["show"]))
        {
            $this->detailsView();
        }
        else
        {
            $this->render("search", ["title" => "Rechercher", "css" => "webroot/css/style.css", "films" => $this->all_films(), "years" => $this->yearsAction()]);
        }
    }

    public function all_films()
    {
        $search = new \Model\FilmModel([]);
        return $search->all_films();
    }

    public function searchAction()
    {
        $search = new \Model\FilmModel($this->request->getQueryParams());
        return $search->search();
    }

    public function detailsView()
    {
        if(isset($_POST['update']))
        {
            header('Location: update');
        }
        else
        {
            $this->render("details", ["title" => "Informations", "css" => "webroot/css/style.css"]);
        }
    }

    public function yearsAction()
    {
        $years = new \Model\FilmModel([]);
        return $years->years();
    }

    public function addView()
    {
        if (isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0)
        {
            $infosfichier = pathinfo($_FILES['picture']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                move_uploaded_file($_FILES['picture']['tmp_name'], 'webroot/assets/films/' . basename($_FILES['picture']['name']));
                $post_data = $this->request->getQueryParams();
                $post_data['picture'] = 'webroot/assets/films/' . basename($_FILES['picture']['name']);
                $add_films = new \Model\FilmModel($post_data);
                $add_films->add_films();
                header("Location: search");
            }
        }
        else
        {
            $this->render("add", ["title" => "Ajouter", "css" => "webroot/css/style.css"]);
        }
    }

    public function updateView()
    {
        if(isset($_POST['update_films']))
        {
            $this->updateAction();
            header("Location: search");
        }
        else
        {
            $this->render("update", ["title" => "Modifier", "css" => "webroot/css/style.css"]);
        }
    }

    public function updateAction()
    {
        $update_films = new \Model\FilmModel($this->request->getQueryParams());
        return $update_films->update_films();
    }

    public function deleteView()
    {
        $this->deleteAction();
        header("Location: search");
    }

    public function deleteAction()
    {
        $delete_films = new \Model\FilmModel($this->request->getQueryParams());
        return $delete_films->delete_films();
    }
}

?>