<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.25.11
 * Time: 14:18
 */

class UserDto
{
    private $name;
    private $email;
    private $password;
    private $confirmed_password;

    public function __construct($name, $email, $password, $confirmed_password){
       $this->name = $name;
       $this->email = $email;
       $this->password = $password;
       $this->confirmed_password = $confirmed_password;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getConfirmedPassword()
    {
        return $this->confirmed_password;
    }



}