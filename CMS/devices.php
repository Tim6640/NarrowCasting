<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = "Aapparaten";
include_once("../includes/cmsHeader.php");
$device = new Device();

if(!isset($_SESSION['login']))
{
    header("Location: ../pages/login.php");
    die();
}

if (isset($_POST['logOut']))
{
    session_destroy();
    header("Location: ../pages/login.php");
    die();
}

?>

<section id="main">
    <div class="container">
        <div class="row">
        <?php include_once(__ROOT__."includes/cmsMenu.php") ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Devices</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php foreach($device->getDevices() as $devices){
                                echo "
                                <tr>
                                    <td><td><img src='../assets/img/screen.png' class='img-fluid float-left' style='height: 100px'></td></td>
                                    <td>Device name: ".$devices['deviceName']."<br>
                                        Device address: ".$devices['deviceMacAddress']."<br>
                                        Componentens active: <br>
                                    </td>
                                </tr>";
                                } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
