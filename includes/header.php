<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 7-3-2018
 * Time: 14:20
 */
//header('Content-Type: image/png');
//$pathLess = $_SERVER["DOCUMENT_ROOT"]."/assets/less/style.less";
//echo "<img src='http://localhost/assets/img/Landstede_logo.png' alt='no img'/>"



?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet/less" type="text/css" href="/assets/less/style.less" />
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title><?php echo $title  ?></title>

</head>
<body>
<div class="header-logo row">
    <img src="http://localhost/assets/img/Landstede_logo.png" alt="Could not load"/>
<!--    alt="http://www.ondile.nl/magento/media/catalog/category/Landstede_logo_600x240px.png"-->
    <h1 style="margin-left: auto; margin-right: auto;" id="headerTime"></h1>
</div>

</body>
</html>
<script>

    setInterval(function () {

        var d      = new Date();
        var hour   = d.getHours();
        var minute = d.getMinutes();
        //var second = d.getSeconds();
        var element;

        element = document.getElementById("headerTime");
        if (minute <= 9){
            element.innerHTML = hour + ":0" + minute;
        }else{
            element.innerHTML = hour + ":" + minute;
        }
    },1000)

</script>

