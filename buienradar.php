<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 20-3-2018
 * Time: 09:28
 */

include_once("autoload.php");
include "includes/header.php";



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

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>
