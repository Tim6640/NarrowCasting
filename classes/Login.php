<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 22/02/2018
 * Time: 15:08
 */

class Login
{
    //properties.
    private $_email;
    private $_password;

    //Constructor.
    public function __construct($email, $password){

        $this->setUsername($email);
        $this->setPassword($password);

    }

    //Setters.
    public function setUsername($email){

        $this->_email = $email;

    }

    public function setPassword($password){

        $this->_password = $password;

    }

    //Getters.
    public function getUsername(){

        return $this->_email;

    }

    public function getPassword(){

        return $this->_password;

    }

    //Method.
    public function loginCustomer(){


    }

}
