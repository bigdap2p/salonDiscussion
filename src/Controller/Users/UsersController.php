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

        if(filter_input(INPUT_POST, "createDiscussion")){
            $lastId = new UserLoginRepository();
            $resultat = $lastId->selectLastIdDiscussion();
            $idDiscussion = $resultat[0]["id"];
            $idDiscussion = $idDiscussion+1;

            filter_input_array(INPUT_POST)["nom_discussion"];

            $tabtest = filter_input_array(INPUT_POST);
            $nmbtab = count($tabtest);
            $nmbtab = $nmbtab-2;
            for ($i=0;$i<$nmbtab;$i++){
                if($i<=0){
                    $nmbparticipant = current($tabtest);
                }else{
                    $nmbparticipant = $nmbparticipant.",".next($tabtest);
                }
            }

            $id_discussion = $idDiscussion;
            $nom_fichier_json = $idDiscussion.".json";
            $nom_discussion = filter_input_array(INPUT_POST)["nom_discussion"];
            $participant = $nmbparticipant;
            $admin_discussion = $users[0]->getEmail();


            $discussionNew = new UserLoginRepository();
            $discussionNew->createDiscussion($id_discussion,$nom_discussion,$participant,$admin_discussion,$nom_fichier_json);

            $tabParticipant = explode(",",$nmbparticipant);
            foreach ($tabParticipant as $value) {
                $email = $value;
                $discussioUsers = new UserLoginRepository();
                $selectUserDiscussion = $discussioUsers->selectDiscussionUser($email);
                $newIdInsert = $selectUserDiscussion[0]["discussion"] . "," . $idDiscussion;
                echo $newIdInsert;
                $updateUser2 = new UserLoginRepository();
                $updateUser2->updateUserDiscussion($email, $newIdInsert);
            }

            header("/users");
        }
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
