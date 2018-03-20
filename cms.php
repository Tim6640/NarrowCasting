<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 16-3-2018
 * Time: 11:53
 */
include "includes/cmsMenu.php";
include "includes/header.php";

$device = new device();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    foreach($device->getDeviceComponentInfo($id) as $componentInfo){
        var_dump($componentInfo);
    }
}

$time = date('H:i:s');
?>

<div class="container-fluid">

    <div class="row">

        <div class="col-2">

            <h1>Beheer</h1>

        </div>

        <div class="col-10">

            <h1>Componenten</h1>

            <h1 id="time"></h1>

            <p>U bent ingelogd als "[username]" <a href="#">Log uit.</a></p>

        </div>

    </div>

    <div class="row">

        <div></div>

        <div></div>

    </div>

</div>

<script>

    function updateClock ( )
    {
        var currentTime = new Date ( );
        var currentHours = currentTime.getHours ( );
        var currentMinutes = currentTime.getMinutes ( );
        var currentSeconds = currentTime.getSeconds ( );

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = ( currentMinutes / 12 ) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = ( currentHours == 0 ) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


        $("#time").html(currentTimeString);

    }

    $(document).ready(function()
    {
        setInterval('updateClock()', 1000);
    },1000);
    }

</script>
