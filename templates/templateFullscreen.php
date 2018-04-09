<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 7-3-2018
 * Time: 14:11
 */
include_once ($_SERVER["DOCUMENT_ROOT"]."autoload.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");
$title = basename(__FILE__, '.php');

?>
!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container-fluid">

    <div class="row">

        <div id="fullscreen" class="col-12">

            <?php
            $device = new Device();
            $deviceID = $device->getPropDeviceID();
            $deviceInfo = $device->getDeviceComponentInfo($deviceID);
            $component = new Component();
            $componentInfo = $component->selectComponent($deviceID);
            var_dump($componentInfo);
            $componentName = $componentInfo['componentName'];
            $params = array(
                $deviceInfo[0]['componentSource'],
                $deviceInfo[0]['componentUsername'],
                $deviceInfo[0]['componentPassword']
            );
            $component = new componentLoader($deviceID, $componentName, $params);
            $component->getView();
            ?>

        </div>

    </div>

</div>
</body>
</html>

