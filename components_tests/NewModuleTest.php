<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-2-2018
 * Time: 09:25
 */
namespace components_tests;

use components\NewModule;
use PHPUnit\Framework\TestCase;

class NewModuleTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance() {
        new NewModule("test");
    }

    public function testShouldBeAbleToSetTheMessage() {
        $module = new NewModule("test");
        $result = $module->showMessage();
        $this->assertEquals("test", $result);
    }
}
