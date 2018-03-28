<?php

/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 6-3-2018
 * Time: 09:09
 */
spl_autoload_register(function ($class){
    $pathClasses = __ROOT__."classes\\". $class . ".php";
    $pathComponents = __ROOT__."components\\" . $class . ".php";
    $pathTemplateLoader = __ROOT__."templates\\". $class . ".php";

    if (file_exists($pathClasses)){
        require_once $pathClasses;
    } elseif (file_exists($pathComponents)){
        require_once $pathComponents;
    }
});
