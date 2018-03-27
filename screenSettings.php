<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 22-3-2018
 * Time: 11:37
 */
include_once("autoload.php");

$template = new Template();
$templates = $template->selectAllTemplates();

if(isset($_GET['id'])){
    $deviceID = $_GET['id'];
    $device = new Device();
    $device->setPropDeviceID($deviceID);
}
?>
<form name="screenSettings" method="post">
    <select title="templateSelect">
        <?php
        foreach ($templates as $template){
            echo '<option value="0">'.$template['templateName'].'</option>';
        }
        ?>
    </select>
<br>
    Slides: <input title="Slider" type="checkbox" name="slider">
    <?php
    $devicesConfig = $device->getDeviceConfig();
    $slider = false;
    if(count($devicesConfig) >= 3) {
        $slider = true;
    }
echo "<br>";
    if($slider === true){
        echo 'Interval: <input title="Interval" type="number" step="any" name="slideInterval">';
    }

    if ($slider === true){

    }

    ?>

    <input title="Save" type="submit" name="save">
</form>