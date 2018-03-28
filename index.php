<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */
$title = basename(__FILE__, '.php');
include_once("config.php");
include_once("autoload.php");
include "includes/header.php";

$newDevice = new Device();
$templates = $newDevice->getDeviceConfig();

//slider {
foreach ($templates as $template){
    //slide {
    $newTemplate = new Init($template['templateID'], $template['componentID'], $template['params']);
    $newTemplate->getView();
    // }
}
// }