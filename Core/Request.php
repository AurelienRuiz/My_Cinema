<?php

namespace Core;

class Request
{
    public $params = [];

    public function __construct()
    {
        $this->post();
        $this->get();
    }

    public function post()
    {
        foreach ($_POST as $key => $value)
        {
            $this->params[$key] = htmlspecialchars(trim($value));
        }
    }

    public function get()
    {
        foreach ($_GET as $key => $value)
        {
            $this->params[$key] = htmlspecialchars(trim($values));
        }
    }

    public function getQueryParams()
    {
        return $this->params;
    }
}

?>