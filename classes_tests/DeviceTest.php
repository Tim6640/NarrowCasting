<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-2-2018
 * Time: 09:25
 */
namespace classes_tests;

use classes\Device;
use PHPUnit\Framework\TestCase;

class DeviceTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance() {
        //arrange
        $module = new Device("deviceID");

        //act

        //assert
        $this->assertInstanceOf(Device::class, $module);
    }

    public function testShouldBeAbleToAddDevice() {
        //arrange
        $module = new Device("deviceID");

        //act
        $module->addDevice("testDevice", "testDeviceDescription");
        $result = $module->selectDevice();

        //assert
        $this->assertEquals("testDevice", $result[1]);
        $this->assertEquals("testDeviceDescription", $result[2]);
    }

    public function testShouldBeAbleToBindTemplate() {
        //arrange
        $module = new Device("deviceID");

        //act
        $module->bindTemplate("templateName");
        $result = $module->selectDevice();

        //assert
        $this->assertEquals("templateName", $result['deviceTemplate']);
    }
}
