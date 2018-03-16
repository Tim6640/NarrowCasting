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
     * @return string the params
     */
    public function getPropParams()
    {
        foreach ($this->prop_params as $param){
            $params = $param;
            $counter = 1;
            $countArray = count($this->prop_params);
            if ($counter < $countArray)
            {
                $params .= ", ";
            }
            $counter++;
        }
        return $params;
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
        $component($this->getPropParams());
        return $component->view();
    }
}