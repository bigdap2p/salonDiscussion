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
     
     
     
     $login,
     
     
     $discussion,


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

  
  
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
     public function setLogin(string $login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
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

	
    public function setDiscution(string $discussion)
    {
        $this->discussion = $discussion;
    }

    /**
     * @return mixed
     */
    public function getDiscussion()
    {
        return $this->discussion;
    }
}
