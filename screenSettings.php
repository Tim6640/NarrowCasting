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
var_dump($templates);
?>
<select title="templateSelect">
    <?php
    foreach ($templates as $template){
        echo '<option value="0">'.$template['templateName'].'</option>';
    }
    ?>
</select>
