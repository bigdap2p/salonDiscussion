<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 27/02/2019
 * Time: 09:36
 */

namespace PHPInitiation\Validator;


class ValidatorInfo extends Validator
{
    public function valid():array
    {
            $error = [];
            if (
            $this->post("firstname", FILTER_VALIDATE_REGEXP,"/^[A-Z]{1}[a-z\\xe0-\\xff]{2,31}$/u")
            )
            {
                echo "ok";
            }else {
                $error["firstname"] = "prenon non ok";
            }
        return $error;
    }
}