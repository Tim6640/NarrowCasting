<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:58
 */

namespace components;


class ComponentLoader
{
    private $_context;

    private $_isActive;

    public function __construct($context, $isActive) {
        $this->_context = $context;
        $this->_isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->_context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->_context = $context;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = $isActive;
    }
}