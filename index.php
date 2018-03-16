<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */

$title = basename(__FILE__, '.php');

include_once("autoload.php");
include "templates/templateLoader.php";
include "includes/header.php";

$device = new Device();
$template = new TemplateLoader($device->getPropDeviceID());
$template->getTemplate();
?>

