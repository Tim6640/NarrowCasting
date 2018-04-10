<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = "Componenten koppelen";
include_once("../includes/cmsHeader.php");
$component = new Component();
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Settings</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <form method="post" class="list-group-item" title="settings" name="settings">
                        <p>Apparaat:
                            <span>
                                <select title="device" name="device">
                                    <?php
                                    foreach($device->getDevices() as $devices)
                                    {
                                        echo '
                                        <option value="'.$devices['deviceID'].'">'.$devices['deviceName'].'</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </span>
                        </p>
                        <p>Pagina:
                            <span>
                                <select title="device" name="device">
                                    <?php
                                    $device->setPropDeviceID($_POST['device']);
                                    var_dump(array_unique($device->getDeviceConfig()));
                                    foreach(array_unique($device->getDeviceConfig()) as $devices)
                                    {
                                        echo '
                                        <option value="'.$devices['deviceID'].'">'.$devices['deviceName'].'</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>