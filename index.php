<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */

use components\NSComponent;

$component = new NSComponent("http://webservices.ns.nl/ns-api-avt?station=Harderwijk");

$component->parseXml();