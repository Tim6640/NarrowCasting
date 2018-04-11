<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-2-2018
 * Time: 09:26
 */
/**
 * @class
 * @extends Crud
 * this class is used for everything that has a relation with device
 */
class Device extends Crud
{
    /**
     * the device id
     */
    private $prop_deviceID;

    /**
     * the mac address
     */
    private $prop_macAddress;

    /**
     * @construct
     * calls the crud construct
     * sets the device id based on the mac address
     */
    public function __construct()
    {
        $this->prop_macAddress = $this->deviceMacAddress();
        $columns = array("deviceID");
        $macAddress = $this->deviceMacAddress();
        parent::__construct("device", $columns, "deviceMacAddress", $macAddress);
        $deviceInfo = $this->selectFromTable();
        @$this->prop_deviceID = $deviceInfo[0]['deviceID']; //the @ symbol prevents the error notice from displaying, this error should be resolved in future additions.
        $this->setPropWhere("");
    }

    /**
     * @return $prop_macAddress
     */
    public function getPropMacAddress()
    {
        return $this->prop_macAddress;
    }

    /**
     * @param $macAddress
     */
    private function setPropMacAddress($macAddress)
    {
        $this->prop_macAddress = $macAddress;
    }

    /**
     * @return $prop_deviceID
     */
    public function getPropDeviceID()
    {
        return $this->prop_deviceID;
    }

    /**
     * @param int $deviceID
     */
    public function setPropDeviceID($deviceID)
    {
        $this->prop_deviceID = $deviceID;
    }

    /**
     * @return $macAddress
     */
    public function deviceMacAddress()
    {
        $mycom = system("ipconfig /all"); //Execute external program to display output

        return $mycom;
    }

    public function getDeviceConfig()
    {
        $this->setPropTable("device_template_component");
        $this->setPropColumns(array("*"));
        $this->setPropWhere("deviceID");
        $this->setPropWhereConditions($this->getPropDeviceID());
        return $this->selectFromTable();
    }

    /**
     * @return array all devices
     */
    public function getDevices(){
        $this->setPropTable("device");
        $this->setPropColumns(array("*"));
        return $this->selectFromTable();
    }

    /**
     * @param string $deviceName
     * creates a new device
     */
    public function createDevice($deviceName){
        $columns = array("deviceName", "deviceMacAddress");
        $values = array($deviceName, $this->getPropMacAddress());
        $this->setPropTable("device");
        $this->setPropColumns($columns);
        $this->setPropValue($values);
        $this->insertIntoTable();
    }

    public function getDistinctSlidesID(){
        $this->setPropTable("device_template_component");
        $this->setPropColumns("slideID");
        $this->distinctSelectFromTable();
    }


    ///////////////////////////////////////////////////Still needs update

    /**
     * @param string $deviceName
     * updates the device name of the device
     */
    public function changeDeviceName($deviceName){
        $columns = array("deviceName");
        parent::__construct("device", $columns,"deviceID", $this->getPropDeviceID(),"", $deviceName);
        return $this->updateIntoTable();
    }
}