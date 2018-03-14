<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-2-2018
 * Time: 09:26
 */
class Device
{
    private $_deviceID;

    private $_macAddress;

    public function __construct()
    {

    }

    /**
     * @return the $mac
     */
    public function getMacAddress()
    {
        return $this->_macAddress;
    }

    /**
     * @param the $macAddress
     */
    private function setMacAddress($macAddress)
    {
        $this->_macAddress = $macAddress;
    }

    /**
     * @return mixed
     */
    public function getDeviceID()
    {
        return $this->_deviceID;
    }

    /**
     * @param mixed $deviceID
     */
    public function setDeviceID($deviceID)
    {
        $this->_deviceID = $deviceID;
    }

    private function deviceMacAddress()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $arp = `arp -a $ipAddress`;
        $lines = explode("\n", $arp);
        $macAddress = null;

        foreach ($lines as $line)
        {
            $cols = preg_split('/\s+/', trim($line));
            if ($cols[0] == $ipAddress)
            {
                $this->setMacAddress($cols[1]);
            }
        }
    }

    public function bindTemplate($templateName)
    {
        // use extend crud sql update
    }

    public function bindComponent($componentID, $componentLocation)
    {
        //use extend crud sql update
    }

    public function CreateDevice(){

    }
}