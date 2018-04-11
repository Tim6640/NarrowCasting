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
$username = $_SESSION['login']['username'];

$active = $breadCrumb;
$dashboard = "";
$devices = "";
$components = "";
$users = "";
$componentConnect = "";
switch ($active) {
    case("dashboard"):
        $dashboard = "active";
        break;
    case("Apparaten"):
        $devices = "active";
        break;
    case("Componenten"):
        $components = "active";
        break;
    case("Gebruikers"):
        $users = "active";
        break;
    case("Componenten koppelen"):
        $componentConnect = "active";
        break;
}
?>
<div class="col-md-3">
    <div class="list-group">
        <a href="dashboard.php" class="list-group-item <?php echo $dashboard ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
        <a href="devices.php" class="list-group-item <?php echo $devices ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Apparaten <span class="badge"><?php echo count($device->getDevices())?></span></a>
        <a href="components.php" class="list-group-item <?php echo $components ?>"><i class="fa fa-puzzle-piece"></i> Componenten <span class="badge"><?php echo count($component->getComponents())?></span></a>
        <a href="users.php" class="list-group-item <?php echo $users ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Gebruikers <span class="badge"><?php echo count($user->getUsers())?></span></a>
        <a href="componentConnect.php" class="list-group-item <?php echo $componentConnect ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Componenten koppelen </a>
        <a href="#" class="list-group-item"> <p>Welkom <?php echo $username ?> </p> <form method="POST">    <input type="submit" value="Log uit" name="logOut"> </form> </a>
    </div>
</div>
