<?php
/**
 * Created by PhpStorm.
 * User: sahar
 * Date: 08.11.2019
 * Time: 18:08
 */

namespace models;


abstract class Model
{


    protected $errors = [];

    public function getErrors()
    {
        return $this->errors;
    }


    public function filterField($field)
    {
        if ($this->$field) {
            $this->$field = htmlentities(strip_tags(trim($this->$field)));
        }
    }

    public function checkRequiredAndLength($field, $length = 50)
    {
        if (!$this->$field) {
            $this->errors[$field] = $field . ' is required field';
        } elseif (strlen($this->$field) > 50) {
            $this->errors[$field] = 'Max length for ' . $field . ' field is 50 characters';
        }
    }

    abstract function validate();

}