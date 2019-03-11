<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 27/02/2019
 * Time: 10:26
 */

namespace PHPInitiation\Validator;


class Validator
{
    protected function post($varName, $filter = null, $regExp = null)
    {
        $options = null;
        if (!$filter){
            $filter = FILTER_DEFAULT;
        } else if(FILTER_VALIDATE_REGEXP === $filter){
            $options = ["options" => ["regexp" => $regExp]];
        }
        return filter_input(INPUT_POST, $varName, $filter, $options);
    }

}