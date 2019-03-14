<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 04/03/2019
 * Time: 12:08
 */

namespace PHPInitiation\repository;

use PHPInitiation\Connection\Connection;
use PHPInitiation\Model\User\UserLogin;

class UserLoginRepository
{
    public function persist($email,$password)
    {
        $dbh = Connection::getConnection();
        $sql = "INSERT INTO `user_login` (`email`,`password`,`time`) VALUE (:email,:password,:time )";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":email", $email);
        $sth->bindValue(":password", $password);
        $sth->bindValue(":time", date("H:i:s Y-m-d"));
        $sth->execute();
    }

    public function findAll():array
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT * FROM user_login";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserLogin::class);
        $users = $sth->fetchAll();
        return $users;
    }

    public function findByEmail ($email)
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT `id`, `password`, `discussion`, `login` FROM `user_login` WHERE `user_login`.`email` = :email";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":email", $email);
        $sth->execute();
        $users = $sth->fetchAll(\PDO::FETCH_CLASS, UserLogin::class);
        return $users;
    }

//    public function listMessage () :array
//    {
//        $dbh = Connection::getConnection();
//        $sql = "SELECT message,email FROM user_message";
//        $sth = $dbh->prepare($sql);
//        $sth->execute();
//        $sth->setFetchMode();
//        $users = $sth->fetchAll();
//        return $users;
//    }

//    public function insertMessage($email,$message)
//    {
//        $dbh = Connection::getConnection();
//        $sql = "INSERT INTO `user_message` (`message`,`email`) VALUE (:email,:message)";
//        $sth = $dbh->prepare($sql);
//        $sth->bindValue(":email", $email);
//        $sth->bindValue(":message", $$message);
//        $sth->execute();
//    }

    public function updateTime($email)
    {
        $dbh = Connection::getConnection();
        $sql = "UPDATE `user_login` SET `time` = :time WHERE `user_login`.`email` = :email;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":email", $email);
        $sth->bindValue(":time", date("H:i:s Y-m-d"));
        $sth->execute();
    }

    public function selectNomDiscussion($idDiscussion)
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT `id_discussion`,`nom_discussion`,`participant`,`admin_discussion`,`nom_fichier_json`
                FROM `discussion` WHERE `id_discussion` =:id ";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id", $idDiscussion);
        $sth->execute();
        $nomDiscussion = $sth->fetchAll();
        return $nomDiscussion;
    }

    public function selectDiscussionAll($idDiscussion)
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT `id_discussion`,`nom_discussion`,`participant`,`admin_discussion`,`nom_fichier_json`
                FROM `discussion` WHERE `id_discussion` =:id ";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id", $idDiscussion);
        $sth->execute();
        $nomDiscussion = $sth->fetchAll();
        return $nomDiscussion;
    }

    public function createDiscussion($id_discussion,$nom_discussion,$participant,$admin_discussion,$nom_fichier_json)
    {
        $dbh = Connection::getConnection();
        $sql = "INSERT INTO `discussion` (`id_discussion`,`nom_discussion`,`participant`,`admin_discussion`,`nom_fichier_json`)
        VALUE (:id_discussion,:nom_discussion,:participant,:admin_discussion,:nom_fichier_json)";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id_discussion", $id_discussion);
        $sth->bindValue(":nom_discussion", $nom_discussion);
        $sth->bindValue(":participant", $participant);
        $sth->bindValue(":admin_discussion", $admin_discussion);
        $sth->bindValue(":nom_fichier_json", $nom_fichier_json);
        $sth->execute();
    }


    public function selectDiscussionUser($email)
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT `discussion` FROM `user_login` WHERE `user_login`.`email` = :email;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":email", $email);
        $sth->execute();
        $discussion = $sth->fetchAll();
        return $discussion;
    }

    public function updateUserDiscussion($email,$idDiscussion)
    {
        $dbh = Connection::getConnection();
        $sql = "UPDATE `user_login` SET `discussion` = :discussion WHERE `user_login`.`email` = :email;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":email", $email);
        $sth->bindValue(":discussion", $idDiscussion);
        $sth->execute();
    }

    public function selectLastIdDiscussion()
    {
        $dbh = Connection::getConnection();
        $sql = "SELECT `id` FROM `discussion` ORDER BY `id` DESC limit 1;";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $lastIdDiscussion = $sth->fetchAll();
        return $lastIdDiscussion;
    }
}
