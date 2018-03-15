<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 7-3-2018
 * Time: 14:11
 */

$title = basename(__FILE__, '.php');

include "../includes/header.php";
?>

<div class="container-fluid">

    <div class="row">

        <div id="fullscreen" class="col-12">

            <?php
            $device = new Device();
            foreach($device->getDeviceComponentInfo() as $componentInfo) {
                $params = array();
                $component = new ComponentLoader($device->getPropDeviceID(), "", $params);
                $component->getView();
            }
            ?>

        </div>

    </div>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>

</body>

