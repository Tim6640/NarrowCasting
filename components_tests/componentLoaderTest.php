<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:58
 */

namespace components_tests;

use PHPUnit\Framework\TestCase;
use components\componentLoader;

class componentLoaderTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance(){
        //arrange
        $module = new componentLoader("componentID");

        //act


        //assert
        $this->assertInstanceOf(componentLoader::class, $module);
    }
}