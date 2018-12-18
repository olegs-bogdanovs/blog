<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.24.11
 * Time: 17:03
 */

class User
{
    private $id;
    private $name;
    private $password;
    private $email;

    public function __construct($id, $name, $password, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }
}