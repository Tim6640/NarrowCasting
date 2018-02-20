<?php

/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-2-2018
 * Time: 09:26
 */
namespace components;

class NewModule
{
    private $_message;

    public function __construct($message)
    {
        $this->_message = $message;
    }

    public function showMessage()
    {
        return $this->_message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->_message;
    }
}