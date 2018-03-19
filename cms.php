<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 11:53
 */
include "includes/cmsMenu.php";

$device = new device();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    foreach($device->getDeviceComponentInfo($id) as $componentInfo){
        var_dump($componentInfo);
    }
}
