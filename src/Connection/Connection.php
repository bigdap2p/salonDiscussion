<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 04/03/2019
 * Time: 09:59
 */

namespace PHPInitiation\Connection;


class Connection
{
    private static $dbh;

    private function __construct (){
        $fileContent = file_get_contents(__DIR__."/../../config/database.json");
        $infoConnection = json_decode($fileContent);

        self::$dbh = new \PDO(
            "mysql:host="
            .$infoConnection->host
            .";port=3306;dbname="
            .$infoConnection->dbname
            .";charset=utf8",
            $infoConnection->user,
            $infoConnection->password,
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    public static function getConnection()
    {
        if (null === self::$dbh) {
            new Connection();
        }

        return self::$dbh;
    }
}