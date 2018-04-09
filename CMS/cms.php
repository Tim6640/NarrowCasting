<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-3-2018
 * Time: 11:37
 */
session_start();
$title = basename(__FILE__, '.php');
include_once ($_SERVER["DOCUMENT_ROOT"]."/autoload.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");

if(!isset($_SESSION['login']))
{
    header("Location: ../pages/login.php");
    die();
}

$username = $_SESSION['login']['username'];

if (isset($_POST['logOut']))
{
    session_destroy();
    header("Location: ../pages/login.php");
    die();
}

$template = new Template();
$templates = $template->selectAllTemplates();
$device = new Device();
if(isset($_GET['id'])){
    $deviceID = $_GET['id'];
    $device->setPropDeviceID($deviceID);
}
?>
<!--<form name="screenSettings" method="post">-->
<!--    <select title="templateSelect">-->
<!--        --><?php
//        foreach ($templates as $template){
//            echo '<option value="0">'.$template['templateName'].'</option>';
//        }
//        ?>
<!--    </select>-->
<!--<br>-->
<!--    Slides: <input title="Slider" type="checkbox" name="slider">-->
<!--    --><?php
//    $devicesConfig = $device->getDeviceConfig();
//    $slider = false;
//    if(count($devicesConfig) >= 3) {
//        $slider = true;
//    }
//echo "<br>";
//    if($slider === true){
//        echo 'Interval: <input title="Interval" type="number" step="any" name="slideInterval">';
//    }
//
//    ?>
<!---->
<!--    <input title="Save" type="submit" name="save">-->
<!--</form>-->


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet/less" type="text/css" href="../assets/less/style.less">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>


<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Narrowcasting System</small></h1>
            </div>
        </div>
    </div>
</header>
<br>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
            <p>Welkom <?php echo $username; ?>  <form method="POST">    <input type="submit" value="Log uit" name="logOut"> </form> </p>
        </ol>
    </div>
</section>


<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="cms.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <span class="badge">12</span></a>
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Devices <span class="badge">25</span></a>
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Components <span class="badge">126</span></a>
                    <a href="user/crudUser.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Beheerders <span class="badge">12</span></a>
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge">12</span></a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Devices</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($device->selectAllDevices() as $devices)
                        {
                            $device->setPropWhereConditions($devices['deviceID']);
                            $componentCount = count($device->getDeviceConfig());
                            echo '<div class="col-md-3">
                                      <div class="well dash-box">
                                          <h2><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>'.$componentCount.'</h2>
                                          <h4>'.$devices['deviceName'].'</h4>
                                      </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Users</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($device->selectAllDevices() as $devices)
                        {
                            $device->setPropWhereConditions($devices['deviceID']);
                            $componentCount = count($device->getDeviceConfig());
                            echo '<div class="col-md-3">
                                      <div class="well dash-box">
                                          <h2><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>'.$componentCount.'</h2>
                                          <h4>'.$devices['deviceName'].'</h4>
                                      </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>