<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 12:07
 */

    include_once("autoload.php");

    $device = new device();

    foreach ($device->selectAllDevices() as $deviceInfo){

        echo "<li><a href='cms.php?id=".$deviceInfo['deviceID']."'>".$deviceInfo['deviceName']."</a></li>";

        echo "<br>";

    }

    ?>

