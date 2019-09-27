<?php
namespace Model;

class FilmModel extends \Core\Entity
{
    public function search()
    {
        $orm = new \Core\ORM();
        if(empty($this->title))
        {
            $title_search = "1";
        }
        else 
        {
            $title_search = "title LIKE '%" . $this->title . "%'";
        }
        if($this->years == "all")
        {
            $years_search = "1";
        }
        else 
        {
            $years_search = "years = '" . $this->years . "'";
        }
        return $orm->find('films', ["WHERE" => " $title_search  AND $years_search"]);
    }

    public function years()
    {
        $orm = new \Core\ORM();
        return $orm->years();
    }

    public function all_films()
    {
        $orm = new \Core\ORM();
        return $orm->find('films');
    }

    public function add_films()
    {
        $orm = new \Core\ORM();
        return $orm->create('films', ["title" => $this->title, "years" => $this->years, "resum" => $this->resum, "picture" => $this->picture]);
    }

    public function update_films()
    {
        $orm = new \Core\ORM();
        return $orm->update('films', $this->id, ["title" => $this->title, "years" => $this->years, "resum" => $this->resum]);
    }

    public function delete_films()
    {
        $orm = new \Core\ORM();
        return $orm->delete('films', $this->id);
    }
}

?>