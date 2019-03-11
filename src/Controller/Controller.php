<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 28/02/2019
 * Time: 10:20
 */

namespace PHPInitiation\Controller;


class Controller
{

    protected function display(string $templatePath,array $data=[])
    {
        extract($data);
        include __DIR__ . "/../../template/" . $templatePath;
    }

    protected function session ($key = null, $value = null) {

//        init session
        if(PHP_SESSION_ACTIVE !== session_status()){
            session_start();
        }
        if(null !== $key && null !== $value){
            $_SESSION[$key] = $value;
        } elseif (null !== $key && false !== $key){
            return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : null;
        } elseif (false === $key) {
            session_destroy();
            $_SESSION = [];
        }

    }

    public function trySession () {

    }
}