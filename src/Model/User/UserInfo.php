<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 22/02/2019
 * Time: 14:42
 */

namespace PHPInitiation\Model\User;


class UserInfo
{
    private
    $phone,
    $firstName,
    $lastName;


    public function setPhone(int $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }



    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
}