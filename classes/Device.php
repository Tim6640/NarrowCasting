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
        $this->setPropColumns(array("*"));
        $this->setPropWhere("");
        $this->setPropWhereConditions("");
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
    private function deviceMacAddress()
    {
        ob_start(); // Turn on output buffering
        system("ipconfig /all"); //Execute external program to display output
        $mycom = ob_get_contents(); // Capture the output into a variable
        ob_clean(); // Clean (erase) the output buffer

        $findme = "Physical";
        $pmac = strpos($mycom, $findme); // Find the position of Physical text
        $mac = substr($mycom, ($pmac + 36), 17); // Get Physical Address

        return $mac;
    }

    public function getDeviceConfig(){
        $this->setPropTable("device_template_component");
        $this->setPropColumns(array("*"));
        $this->setPropWhere("deviceID");
        $this->setPropWhereConditions($this->getPropDeviceID());
        return $this->selectFromTable();
    }

    /**
     * @return array all devices
     */
    public function selectAllDevices(){
        return $this->selectFromTable();
    }

    ///////////////////////////////////////////////////Still needs update

    /**
     * @param string $deviceName
     * creates a new device
     */
    public function createDevice($deviceName){
        $columns = array("deviceName", "deviceDescription");
        $values = array($deviceName, $this->getPropMacAddress());
        parent::__construct("device", $columns,"","", "", $values);
        $this->insertIntoTable();
    }

    /**
     * @param string $deviceName
     * updates the device name of the device
     */
    public function changeDeviceName($deviceName){
        $columns = array("deviceName");
        parent::__construct("device", $columns,"deviceID", $this->getPropDeviceID(),"", $deviceName);
        return $this->updateIntoTable();
    }

    /**
     * @return array device component info
     */
    public function getDeviceComponentInfo($deviceID){
        $columns = array("*");
        parent::__construct("device_component", $columns, "deviceID", $deviceID);
        return $this->selectFromTable();
    }
}