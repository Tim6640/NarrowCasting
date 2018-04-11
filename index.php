<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 23-2-2018
 * Time: 09:40
 */

$title = basename(__FILE__, '.php');
include_once ("autoload.php");
include_once ("includes/header.php");

$device = new Device;
var_dump($device->deviceMacAddress());
?>


<!--<head>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div class="centerTopSolid">-->
<!--    <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <div>-->
<!--                <h1>Welkom</h1>-->
<!--                <p>Dit is de website voor het narrowcasting systeem van Landstede ICT Harderwijk. <br>-->
<!--                    Als u een account heeft als beheerder dan kunt op de volgende knop drukken.</p>-->
<!--                <form id="toLoginFromIndex" action="pages/login.php">-->
<!--                    <button class="btn btn-primary" type="submit" id="toLoginFromIndex" value="Submit">Naar Login Beheer</button>-->
<!--                </form>-->
<!--                <br>-->
<!--                <p>Bent u <b>geen</b> beheerder? Gelieve deze site te verlaten.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php
include_once ("includes/footer.php");
?>
</body>

</html>


