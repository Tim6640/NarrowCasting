<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 12:07
 */

include_once ($_SERVER["DOCUMENT_ROOT"]."autoload.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");

    $device = new device();

    foreach ($device->selectAllDevices() as $deviceInfo){

        echo "<li><i class='fas fa-caret-right'></i>  <a href='cmsOld.php?id=".$deviceInfo['deviceID']."'>".$deviceInfo['deviceName']."</a></li>";

        echo "<br>";

    }

    ?>

