<?php
/**
 * Created by PhpStorm.
 * User: sahar
 * Date: 09.11.2019
 * Time: 12:00
 */

namespace models;


class Admin extends Model
{

    public $username;
    public $password;

    public function validate()
    {
        $this->checkRequiredAndLength('username');
        $this->checkRequiredAndLength('password');


        if (!$this->errors && !($this->username == 'admin' && $this->password == '123')) {
            $this->errors['wrongCredentials'] = 'Invalid username or password';
        }

        if ($this->errors) {
            return false;
        }
        return true;
    }
}