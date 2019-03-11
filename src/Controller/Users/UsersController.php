<?php

namespace PHPInitiation\Controller\Users;


use PHPInitiation\Model\User\User;
use PHPInitiation\Model\User\UserInfo;
use PHPInitiation\Model\User\UserLogin;
use PHPInitiation\Validator\ValidatorInfo;
use PHPInitiation\Validator\ValidatorLogin;
use PHPInitiation\Validator\ValidatorSignin;
use PHPInitiation\Controller\Controller;
use PHPInitiation\Connection\Connection;
use PHPInitiation\repository\UserLoginRepository;


class UsersController extends Controller
{
    public function new()
    {
        if ($this->session("id")) {
            header("location: home");
        }

        $error = [];
        if (filter_input(INPUT_POST, "signin")) {
            $validatorSignin = new ValidatorSignin();
            $validatorInfo = new ValidatorInfo();
            $errorSignin = $validatorSignin->valid();
            $errorInfo = $validatorInfo->valid();
            $error = $errorSignin + $errorInfo;
            var_dump($error);

            if (0 === count($error)) {
                $email = filter_input(INPUT_POST, "email");
                $password = password_hash(filter_input(INPUT_POST, "pass"), PASSWORD_DEFAULT);
                try {

                    $persist = new UserLoginRepository();
                    $persist->persist($email,$password,$time);
                    header("Location: localhost/php-initiation/public/login");

                    echo "compte crée";
                } catch (\PDOException $e) {

                    if ("23000" === $e->getCode()) {
                        $error["email"] = "l'email existe déjà ! ";
                    } else {
                        $error["pdo"] = "please re try later: " . $e->getMessage();
                    }
                }
            }
        }
        $title = "signin";
        include __DIR__ . "/../../../template/users/users_new.html.php";

    }
    public function read()
    {
        try {
                $repository = new UserLoginRepository();
                $users = $repository->findAll();

        } catch (\PDOException $e) {
                }

                $this->display("users/users.html.php", [
                    "title" => "Users",
                    "users" => $users
                ]);

    }

    public function create()
    {


    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

