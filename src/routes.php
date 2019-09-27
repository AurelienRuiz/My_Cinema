<?php

namespace Core;

Router::connect("/", ["controller" => "app", "action" => "index"]);
Router::connect("/register", ["controller" => "user", "action" => "register"]);
Router::connect("/login", ["controller" => "user", "action" => "login"]);
Router::connect("/show", ["controller" => "user", "action" => "show"]);
Router::connect("/logout", ["controller" => "user", "action" => "logout"]);
Router::connect("/search", ["controller" => "film", "action" => "search"]);
Router::connect("/details", ["controller" => "film", "action" => "details"]);
Router::connect("/add", ["controller" => "film", "action" => "add"]);
Router::connect("/update", ["controller" => "film", "action" => "update"]);
Router::connect("/delete", ["controller" => "film", "action" => "delete"]);

?>