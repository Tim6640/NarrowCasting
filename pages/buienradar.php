<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 20-3-2018
 * Time: 09:28
 */
$title = basename(__FILE__, '.php');
include_once ($_SERVER["DOCUMENT_ROOT"]."autoload.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");



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

