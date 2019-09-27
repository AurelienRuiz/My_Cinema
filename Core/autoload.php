<?php

spl_autoload_register(function($class)
{
    $class_name = explode("\\", $class);

    if($class_name[0] != "Core")
    {
        array_unshift($class_name, "src");
    }
    
    $new_class = implode("/", $class_name);
    include $new_class . '.php';
});

?>
