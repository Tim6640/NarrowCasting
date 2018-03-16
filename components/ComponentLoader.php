<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:58
 */
class componentLoader
{
    private $prop_componentName;

    private $prop_params;

    function __construct($deviceID, $componentName, $params)
    {
        $this->prop_componentName = $componentName;
        $this->prop_params = $params;
        include_once("components/".$this->getPropComponentName(). ".php");
    }

    /**
     * @return mixed
     */
    public function getPropComponentName()
    {
        return $this->prop_componentName;
    }
    private $_context;

    /**
     * @param mixed $prop_component
    */
    public function setPropComponentName($prop_componentName)
    {
        $this->prop_componentName = $prop_componentName;
    }

    /**
     * @return array the params
     */
    public function getPropParams()
    {
        return $this->prop_params;
    }

    /**
     * @param mixed $prop_params
     */
    public function setPropParams($prop_params)
    {
        $this->prop_params = $prop_params;
    }

    /**
     * @return mixed the view
     */
    public function getView(){
        $component = $this->getPropComponentName();
        $params = $this->getPropParams();
        $newComponent = new $component(...$params);
        return $newComponent->view();
    }
}