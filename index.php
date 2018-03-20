<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */
$title = basename(__FILE__, '.php');

include_once("autoload.php");
include "includes/header.php";
include "templates/TemplateLoader.php";
//slider {
foreach ($templates as $template){
    //slide {
    new TemplateLoader($template['templateID']);
    // }
}
// }
?>