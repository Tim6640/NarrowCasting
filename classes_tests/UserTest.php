<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-2-2018
 * Time: 09:22
 */

namespace classes_tests;

use classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testShouldBeAbleToCreateInstance(){
        //arrange
        $module = new User("userID");

        //act

        //assert
        $this->assertInstanceOf(User::class, $module);
    }

    public function testShouldBeAbleToAddUser(){
        //arrange
        $module = new User("userID");

        //act
        $module->addUser("userName", "email", "userRoleID");
        $result = $module->selectUser();

        //assert
        $this->assertEquals("userName", $result['userName']);
        $this->assertEquals("email", $result['userEmail']);
        $this->assertEquals("userRoleID", $result['userRoleID']);
    }

    public function testShouldBeAbleToUpdateUser(){
        //arrange
        $module = new User("userID");

        //act
        $module->updateUser("userName", "email", "userRoleID");
        $result = $module->selectUser();
    }
}