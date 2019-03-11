<?php
/**
 * @author nicolas
 * @license : MIT
 */

namespace PHPInitiation\Controller\Login;

use mysql_xdevapi\Session;
use PHPInitiation\Connection\Connection;
use PHPInitiation\Controller\Controller;
use PHPInitiation\Model\User\UserLogin;
use PHPInitiation\repository\UserLoginRepository;
use PHPInitiation\Validator\ValidatorLogin;

class LoginController extends Controller
{
    public function login()
    {

        if ($this->session("id")) {
            header("location: home");
        }

        $error = [];
        if (filter_input(INPUT_POST, "signinLogin")) {
            $validator = new ValidatorLogin();
            $validator->valid();
            $error += $validator->valid();
            if (!$error){
                $email = filter_input(INPUT_POST, "email");
                $password = filter_input(INPUT_POST,"pass");
                try {
                    $repository = new UserLoginRepository();
                    $users = $repository->findByEmail($email);
                    if($users && password_verify($password, $users[0]->getPassword())){

                        $this->session("id", $users[0]->getId());

                        $dbh = Connection::getConnection();
                        $sql = "UPDATE `user_login` SET `time` = :time WHERE `user_login`.`email` = :email";
                        $sth = $dbh->prepare($sql);
                        $sth->bindValue(":email", $email);
                        $sth->bindValue(":time", date('Y m d H:i:s'));
                        $sth->execute();

                        header("location: users");
                        exit;
                    }
                    $error["pass"] = "compte does existe re try ";
                } catch (\PDOException $e){
                  echo  $e->getMessage();
                }
            }
        }

        $this->display("login/login.html.php",
            ["title" => "Loginss",
                "error" => $error
            ]
        );
    }

    public function logout()
    {
        include __DIR__ . "/../../../template/login/logout.html.php";

        $this->session(false);
        header("location: login");
        exit;
    }


}



