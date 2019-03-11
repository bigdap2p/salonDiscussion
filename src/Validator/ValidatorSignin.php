<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 27/02/2019
 * Time: 14:37
 */

namespace PHPInitiation\Validator;


class ValidatorSignin extends ValidatorLogin
{

    public function valid(): array
    {

        $error = parent::valid();
        if (!$this->post("pass") !== $this->post("confirm")){
            $this->error["confirm"] = "confirm pass please test";
        }
        return $error;
    }

}