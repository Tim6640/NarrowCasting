<?php

/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 6-3-2018
 * Time: 09:09
 */
spl_autoload_register("autoload::componentLoader");

class autoload
{
    static function componentLoader($className){
        include "classes/".$className . ".php";
    }
}
