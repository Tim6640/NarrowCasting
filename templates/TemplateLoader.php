<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-3-2018
 * Time: 11:09
 */
class TemplateLoader extends Crud
{
    private $prop_templateName;

    private $prop_deviceID;

    function __construct($deviceID)
    {
        $columns = array("deviceDescription");
        parent::__construct("device", $columns, "deviceDescription", $deviceID);
        $this->prop_templateName = $this->selectFromTable();;
        $this->prop_deviceID = $deviceID;
    }

    /**
     * @return mixed
     */
    public function getPropTemplateName()
    {
        return $this->prop_templateName;
    }

    /**
     * @param mixed $prop_templateName
     */
    public function setPropTemplateName($prop_templateName)
    {
        $this->prop_templateName = $prop_templateName;
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

    public function getTemplate() {
            switch ($this->getPropTemplateName()) {
                default:
                    break;
                case "Fullscreen":
                    include_once "templateFullscreen.php";
                    break;
                case "L-R":
                    include_once "templateL-R.php";
                    break;
                case "Lo-Lb-R":
                    include_once "templateLo-Lb-R.php";
                    break;
                case "O-B":
                    include_once "templateO-B.php";
                    break;
                case "Ro-Rb-L":
                    include_once "templateRo-Rb-L.php";
                    break;
            }
        }
    }