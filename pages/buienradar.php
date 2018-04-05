<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 20-3-2018
 * Time: 09:28
 */
$title = basename(__FILE__, '.php');
include_once "../includes/header.php";
include_once("../autoload.php");



?>
<html>
<head>
</head>
<body>
<div>
<?php
    $radar = new Buienradar("","","","", "","","","","","");
    $radar = $radar->view();
?>
</div>
</body>
</html>

