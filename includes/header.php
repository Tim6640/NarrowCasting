<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 7-3-2018
 * Time: 14:20
 */
?>
<head>

    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet/less" type="text/css" href="assets/less/style.less">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>

    <title><?php echo $title  ?></title>

</head>

<body>

<div class="header-logo row">

    <img src="assets/img/Landstede_logo.png" alt="http://www.ondile.nl/magento/media/catalog/category/Landstede_logo_600x240px.png">

    <h1 style="margin-left: auto; margin-right: auto;" id="headerTime"></h1>

</div>

<script>

    setInterval(function () {

        var d      = new Date();
        var hour   = d.getHours();
        var minute = d.getMinutes();
        //var second = d.getSeconds();
        var element;

        element = document.getElementById("headerTime");
        if (element) {
            element.innerHTML = hour + ":" + minute;
        }
    },1000)

</script>

