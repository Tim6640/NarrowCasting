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
                        <button class="btn-add-component"><i class="fas fa-plus"></i> Voeg component toe.</button>
                        <h3 class="panel-title"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Componenten</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php foreach($component->getComponents() as $components){
                                echo "
                                <tr>
                                    <td><td><img src='../assets/img/Microcontrolller-01-512.png' class='img-fluid float-left' style='height: 100px'></td></td>
                                    <td>
                                        Component name: ".$components['componentName']."<br>
                                        Status: ".$components['componentActive']."
                                    </td>
                                </tr>";
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>