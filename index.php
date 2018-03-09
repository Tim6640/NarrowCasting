<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */
include_once("autoload.php");

use components\NSComponent;

$component = new NSComponent("http://webservices.ns.nl/ns-api-avt?station=Harderwijk", "tbeek6640@student.landstede.nl", "RspRrenSa25njpME8Rcc0slbpvS3RkUk4twK8bWL44vmIxiBU34_0w");
$component->view();
