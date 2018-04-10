<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = basename(__FILE__, '.php');
include_once("../includes/cmsHeader.php");
$component = new Component();

if(!isset($_SESSION['login']))
{
    header("Location: ../pages/login.php");
    die();
}

$username = $_SESSION['login']['username'];

if (isset($_POST['logOut']))
{
    session_destroy();
    header("Location: ../pages/login.php");
    die();
}

?>

<section id="main">
    <div class="container">
        <div class="row">
            <?php include_once(__ROOT__."includes/cmsMenu.php") ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</h3>
                    </div>
                    <div class="panel-body">
<!--          Content              -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>