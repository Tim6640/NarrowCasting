<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 5-3-2018
 * Time: 11:53
 */
namespace components_tests;

use components\NSComponent;
use PHPUnit\Framework\TestCase;

class NSComponentTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance() {
        //arrange
        $module = new NSComponent("NSUrl", "userName", "Password");

        //act

        //assert
        $this->assertInstanceOf(NSComponent::class, $module);
    }

    public function testShouldBeAbleToParseXML(){
        //arrange
        //This arrange uses the NS api to test!
        $module = new NSComponent("http://webservices.ns.nl/ns-api-avt?station=Harderwijk", "tbeek6640@student.landstede.nl", "RspRrenSa25njpME8Rcc0slbpvS3RkUk4twK8bWL44vmIxiBU34_0w");

        //act
        $result = $module->parse();

        //assert
        $this->assertInternalType('array', $result);
    }
}
