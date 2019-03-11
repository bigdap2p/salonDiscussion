<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 27/02/2019
 * Time: 09:33
 */

namespace PHPInitiation\Validator;


class ValidatorLogin extends Validator
{

    public function valid():array
    {

            $error = [];

            if (!$this->post("email", FILTER_VALIDATE_EMAIL))
             {
                $error["email"] = "*the adress mail must be an email";
             }

            if(!$this->post("pass"))
            {
                $error["pass"] = "*problem with password ! ";
            }
//            if($this->post("pass")!==$this->post("confirm"))
//            {
//                $error["pass"] = "*problem with password bithh ! ";
//            }

            return $error;


        }


}