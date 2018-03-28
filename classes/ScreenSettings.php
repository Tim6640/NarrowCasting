<?php

/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-3-2018
 * Time: 11:13
 */
class ScreenSettings extends Crud
{
    private $prop_deviceID;

    public function __construct($deviceID)
    {
        $columns = array("*");
        parent::__construct("device_template_component", $columns);
    }

    /**
     * @return mixed
     */
    public function getPropDeviceID()
    {
        return $this->prop_deviceID;
    }

    /**
     * @param mixed $prop_deviceID
     */
    public function setPropDeviceID($prop_deviceID)
    {
        $this->prop_deviceID = $prop_deviceID;
    }

    /**
     * @param string $templateName
     * binds the template to the device
     */
    public function bindTemplate($templateName)
    {
        //Should be INNER JOIN
        $this->setPropTable("template");
        $this->setPropColumns(array("templateID"));
        $this->setPropWhere("templateName");
        $this->setPropWhereConditions("$templateName");
        $templateID = $this->selectFromTable();

        if($templateID !== null){
            $this->setPropTable("device_template_component");
            $this->setPropColumns(array("templateID"));
            $this->setPropWhere("deviceID");
            $this->setPropWhereConditions($this->getPropDeviceID());
            $this->setPropValue(array($templateID));
            $this->updateIntoTable();
        } else {
            "new Exception()";
        }
    }

    /**
     * @param int $componentID
     * @param string $componentParams
     * binds the component with params to the device
     */
    public function bindComponent($componentName, $componentParams)
    {
        //Should be INNER JOIN
        $this->setPropTable("component");
        $this->setPropColumns(array("componentID"));
        $this->setPropWhere("componentName");
        $this->setPropWhereConditions("$componentName");
        $componentID = $this->selectFromTable();

        if($componentID !== null) {
            $this->setPropTable("device_template_component");
            $this->setPropColumns(array("componentID", "params"));
            $this->setPropWhere("deviceID");
            $this->setPropWhereConditions($this->getPropDeviceID());
            $this->setPropValue(array($componentID, "$componentParams"));
            $this->updateIntoTable();
        } else {
            "new Exception()";
        }
    }
}