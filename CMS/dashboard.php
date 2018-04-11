<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-3-2018
 * Time: 11:37
 */
//session_start();
$title = "Dashboard";
$breadCrumb = "Dashboard"; //basename(__FILE__, '.php');
include_once ("../includes/cmsHeader.php");

if(!isset($_SESSION['login']))
{
    header("Location: ../pages/login.php");
    die();
}

if (isset($_POST['logOut']))
{
    session_unset();
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

<section id="main">
    <div class="container">
        <div class="row">
            <?php include_once(__ROOT__."/includes/cmsMenu.php") ?>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Apparaten</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($device->getDevices() as $devices)
                        {
                            $device->setPropWhereConditions($devices['deviceID']);
                            $componentCount = count($device->getDeviceConfig());
                            echo '<div class="col-md-6">
                                      <div class="well dash-box">
                                          <h2  style="text-align: center"><img src=\'../assets/img/screen.png\' class=\'img-fluid\' style=\'height:50px\'><br>'.$componentCount.'</h2>
                                          <h4 style="text-align: center">'.$devices['deviceName'].'</h4>
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Beheerders</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php
                            $user = new User;
                            foreach ($user->getUsers() as $user)
                            {
                                echo '
                                    <tr>     
                                        <td><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h2></td>
                                        <td><h4>'.$user['userName'].'</h4></td>
                                    </tr>
                                    ';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>