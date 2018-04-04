<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 11:53
 */
session_start();
if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}
$username = $_SESSION['login']['username'];

if (isset($_POST['logOut']))
{
    session_destroy();
    header("Location: login.php");
    die();
}
//include "includes/header.php";

/*$device = new device();

if (isset($_GET['id'])){

    $id = $_GET['id'];

    foreach($device->getDeviceComponentInfo($id) as $componentInfo){

        var_dump($componentInfo);
    }
}*/
$title = basename(__FILE__, '.php');
?>
<head>

    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet/less" type="text/css" href="../assets/less/style.less">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>

    <title><?php echo $title  ?></title>

</head>

<body>

    <div class="container-fluid">

        <div class="row blue">

            <div class="col-2">

                <img src="../assets/img/Landstede_logo.png" alt=""><h1>Beheer</h1>

                <!--<div>

                    <ul>

                        <?php
/*
                        include "includes/cmsMenu.php";

                        */?>

                    </ul>

                    <button>Settings</button>

                </div>-->

            </div>

            <div class="col-10">

                <div class="row">

                    <h2>Componenten</h2>

                    <h2 id="time"></h2>

                    <p>Welkom <?php echo $username; ?>  <form method="POST">    <input type="submit" value="Log uit" name="logOut"> </form> </p>

                </div>

            </div>

        </div>

        <div class="row">

                <div class="col-2 mac-list">

                    <h3><u>Connected Devices:</u></h3>
                    <p>(Click a device to access the components)</p>

                    <ul>

                        <?php

                        include "includes/cmsMenu.php";

                        ?>

                    </ul>

                    <button>Settings</button>

                </div>


            <div class="col-10 templates">

                <!-- This spot is reserved for the implementation of various dashboard settingscreens. -->

            </div>

        </div>

    </div>

    <script>

        /*this code puts the date and time in the header of the CMS dashboard. It is refreshed every second to allow for an exact representation of the time and date.*/
        setInterval(function () {

            var d      = new Date();
            var hour   = d.getHours();
            var minute = d.getMinutes();
            //var second = d.getSeconds();
            var year   = d.getFullYear();
            var month  = d.getMonth();
            var day    = d.getDay();
            var element;

            switch (month) {
                case 1:
                    month = "Januari";
                    break;
                case 2:
                    month = "Februari";
                    break;
                case 3:
                    month = "Maart";
                    break;
                case 4:
                    month = "April";
                    break;
                case 5:
                    month = "Mei";
                    break;
                case  6:
                    month = "Juni";
                    break;
                case  7:
                    month = "Juli";
                    break;
                case  8:
                    month = "Augustus";
                    break;
                case  9:
                    month = "September";
                    break;
                case  10:
                    month = "Oktober";
                    break;
                case  11:
                    month = "November";
                    break;
                case  12:
                    month = "December";
                    break;
            }

            element = document.getElementById("time");

            if (element) {

                if( minute < 10 ){

                    element.innerHTML = day + " " + month + " " + year + ", " + hour + ":0" + minute;

                }else{

                    element.innerHTML = day + " " + month + " " + year + ", " + hour + ":" + minute;

                    }

                    //element.innerHTML = day + " " + month + " " + year + ", " + hour + ":" + minute;

                }

        },1000)

    </script>

</body>
