<?php

use PHPInitiation\Foo;
use PHPInitiation\Controller\Users\UsersController;
use PHPInitiation\Controller\Home\HomeController;

# je récupère le loader du composer
require __DIR__ . "/../vendor/autoload.php";

$url = filter_input(INPUT_SERVER, "REDIRECT_URL");
$method = strtolower($_SERVER["REQUEST_METHOD"]);
$baseUrl = "/php-initiation/public";
$fileContent = file_get_contents("../config/routes.json");
$routes = json_decode($fileContent);
$classname = "PHPInitiation\\Controller\\";

$_POST = $_GET = $_SERVER = null;

foreach ($routes as $value){
    if ($url !== $baseUrl . $value->url) {
        continue;
    }
    $myArray = explode(",", $value->method);
    if (!in_array($method,$myArray)){
            header("HTTP/1.1 405 Method Not Allowed");
            die("method Not Allowed");
    }
    $newString = $classname . str_replace("/","\\",$value->controller);
    $obj = new $newString();
    $obj->{$value->action}();
    exit;
    }
header("HTTP/1.1 404 Method Not Found");
die("Not Found");




