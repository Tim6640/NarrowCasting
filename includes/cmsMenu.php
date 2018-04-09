<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 12:07
 */
$device = new Device();
$user = new User();
$component = new Component();

$active = $breadCrumb;
$dashboard = "";
$devices = "";
$components = "";
$users = "";
$settings = "";
switch ($active) {
    case("dashboard"):
        $dashboard = "active";
        break;
    case("devices"):
        $devices = "active";
        break;
    case("components"):
        $components = "active";
        break;
    case("users"):
        $users = "active";
        break;
    case("settings"):
        $settings = "active";
        break;
    case("username"):
        $username;
        break;
}
?>
<div class="col-md-3">
    <div class="list-group">
        <a href="dashboard.php" class="list-group-item <?php echo $dashboard ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
        <a href="devices.php" class="list-group-item <?php echo $devices ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Devices <span class="badge"><?php echo count($device->getDevices())?></span></a>
        <a href="components.php" class="list-group-item <?php echo $components ?>"><span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span> Components <span class="badge"><?php echo count($component->getComponents())?></span></a>
        <a href="users.php" class="list-group-item <?php echo $users ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo count($user->getUsers())?></span></a>
        <a href="settings.php" class="list-group-item <?php echo $settings ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings </a>
        <a href="#" class="list-group-item"> <p>Welkom <?php echo $username; ?> </p> <form method="POST">    <input type="submit" value="Log uit" name="logOut"> </form>  </a>
    </div>
</div>
