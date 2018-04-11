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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Opties</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item">
                        <form method="post" title="settings" name="device">
                            <p>Apparaat:
                                <span>
                                    <select onselect="send(key)" id="device" title="device" name="device">
                                        <?php
                                        foreach($device->getDevices() as $devices)
                                        {
                                            echo '
                                            <option value="'.$devices['deviceID'].'">'.$devices['deviceName'].'</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                    <script type="text/javascript">
        function select() {
            function send(key) {
                window.location.href = "componentConnect.php?id=" + key;
            }
            send(select.options[select.selectedIndex].value);
        }
</script>
                                </span>
                            </p>
                        </form>
                    <?php
                        $device->setPropDeviceID($_GET['id']);
                        $slides = array_unique($device->getDeviceConfigTable("slideID"), SORT_NUMERIC);
                        var_dump($slides);
                        ?>
                        <form method="post" title="settings" name="slide">
                            <p>Pagina:
                                <span>
                                    <select id="slideSettings" title="slide" name="slide">
                                        <?php
                                        $device->setPropDeviceID($_GET['id']);
                                        $slides = array_unique($device->getDeviceConfigTable("slideID"), SORT_NUMERIC);
//                                        foreach( as $devices)
//                                        {
//                                            echo '
//                                            <option value="'.$devices['deviceID'].'">'.$devices['deviceName'].'</option>
//                                            ';
//                                        }
//                                        ?>
                                    </select>
                                </span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>