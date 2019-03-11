<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 22/02/2019
 * Time: 14:40
 */

namespace PHPInitiation\Model\User;


class UserLogin
{
    private

        /**
         * @var int
         */
     $id,

     /**
     * @var string
     */
     $email,


        /**
         * @var string
         */
        $usersMessage,

     /**
     * @var string
     */
     $password;


    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setMessage(string $usersMessage)
    {
        $this->usersMessage = $usersMessage;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->usersMessage;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}