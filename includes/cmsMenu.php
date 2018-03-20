<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 12:07
 */
?>
<body>
    <?php
    include_once("autoload.php");

    $device = new device();
    foreach ($device->selectAllDevices() as $deviceInfo){
        echo "<a href='cms.php?id=".$deviceInfo['deviceID']."'>".$deviceInfo['deviceName']."</a>";
        echo "<br>";
    }
    ?>

    <button>Settings</button>
</body>