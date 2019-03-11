<?php
/**
 * @author nicolas
 * @license : MIT
 */

namespace PHPInitiation\Model\User;
class User
{
    private
        /**
         * @var int
         */
        $id,

        /**
        * @var UserInfo
        */
        $info,

        /**
        * @var UserAvatar
        */
        $avatar,

        /**
        * @var UserLogin
        */
        $login;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function setInfo(UserInfo $info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getInfo(): ?UserInfo
    {
        return $this->info;
    }



    public function setLogin(UserLogin $login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin(): ?UserLogin
    {
        return $this->login;
    }

}