<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-3-2018
 * Time: 11:37
 */
$breadCrumb = basename(__FILE__, '.php');
include_once("../includes/cmsHeader.php");

$component = new Component();
$template = new Template();
$user = new User();
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
            <div class="col-md-3">
                <div class="list-group">
                    <a href="dashboard.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
                    <a href="devices.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Devices <span class="badge"><?php echo count($device->selectAllDevices())?></span></a>
                    <a href="components.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Components <span class="badge"><?php echo count($component->selectAllComponents())?></span></a>
                    <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo count($user->selectAllUsers())?></span></a>
                    <a href="settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings </a>
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
                            $device->setPropDeviceID($devices['deviceID']);
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
                        <table class="table table-striped">
                            <?php
                            $user = new User;
                            foreach ($user->selectAllUsers() as $user)
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