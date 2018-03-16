<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 7-3-2018
 * Time: 14:11
 */

$title = basename(__FILE__, '.php');

?>

<div class="container-fluid">

    <div class="row">

        <div id="fullscreen" class="col-12">

            <?php
            $device = new Device();
            $component = new componentLoader($device->getPropDeviceID(),"NSComponent",array("http://webservices.ns.nl/ns-api-avt?station=Harderwijk", "tbeek6640@student.landstede.nl", "RspRrenSa25njpME8Rcc0slbpvS3RkUk4twK8bWL44vmIxiBU34_0w"));
            $component->getView();
            ?>

        </div>

    </div>

</div>

</body>

