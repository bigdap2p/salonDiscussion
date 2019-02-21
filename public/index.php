<?php


$method =$_SERVER["REQUEST_METHOD"];
$url = $_SERVER["REDIRECT_URL"];
if("/php-initiation/public/home" === $url){
    echo "Accueil";
}else if ("/php-initiation/public/contact" === $url){
    echo "Contact";
}else{
    echo "PAGE NON TROUVE !!";
}