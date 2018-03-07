<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:58
 */

namespace components_tests;

use PHPUnit\Framework\TestCase;
use components\ComponentLoader;

class ComponentLoaderTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance(){
        //arrange
        $module = new ComponentLoader("componentID");

        //act


        //assert
        $this->assertInstanceOf(ComponentLoader::class, $module);
    }
}