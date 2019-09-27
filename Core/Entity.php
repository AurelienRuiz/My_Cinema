<?php

namespace Core;

class Entity
{
    public function __construct(array $params)
    {
        extract($params);

        foreach ($params as $key => $value)
        {
            $this->$key = $value;
        }
    }

}

?>