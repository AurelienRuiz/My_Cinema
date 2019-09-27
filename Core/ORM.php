<?php

namespace Core;

class ORM
{
    protected $database;

    public function __construct()
    {
        try
        {
            $this->database = new \PDO('mysql:host=localhost;dbname=PiePHP', 'root', '', [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function create($table, $fields) // return id
    {
        $fields_keys = array_keys($fields);
        $array = [];
        $array_values = [];

        foreach ($fields as $key => $value)
        {
            $array[] = "?";
            $array_values[] = $value;
        }
        $columns = implode(",", $fields_keys);
        $unknown = implode(",", $array);

        $my_request = $this->database->prepare("INSERT INTO $table($columns) VALUES ($unknown)");
        $my_request->execute($array_values);
        return $this->database->lastInsertId();
    }

    public function read($table, $id) // return tableau
    {
        $my_request = $this->database->prepare("SELECT * FROM $table WHERE id = ?");
        $my_request->execute(array($id));
        return $my_request->fetchAll();
    }

    public function update($table, $id, $fields) // return booléen
    {
        $array = [];
        $all_values = [];

        foreach ($fields as $key => $value)
        {
            $array[] = "$key = ?";
            $all_values[] = $value;    
        }

        $set_values = implode(",", $array);
        $all_values[] = $id;

        $my_request = $this->database->prepare("UPDATE $table SET $set_values WHERE id = ?");
        return $my_request->execute($all_values);
    }

    public function delete($table, $id) // return booléen
    {
        $my_request = $this->database->prepare("DELETE FROM $table WHERE id = ?");
        return $my_request->execute(array($id));
    }

    public function find($table, $params = array(
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => '')) // return un tableau
    { 
        $array = [];
        foreach ($params as $key => $value)
        {
            if(!empty($value))
            {
                $array[] = "$key $value";
            }
            
        }

        $all_params = implode(" ", $array);
        $my_request = $this->database->query("SELECT * FROM $table $all_params");
        return $my_request->fetchAll();
    }

    public function years()
    {
        $my_request = $this->database->query("SELECT years FROM films GROUP BY years");
        return $my_request->fetchAll();
    }
}

?>