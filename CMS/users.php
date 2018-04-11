<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = "Gebruikers";
include_once("../includes/cmsHeader.php");
$user = new User();
if(!isset($_SESSION['login']))
{
    header("Location: ../pages/login.php");
    die();
}

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
                        <button class="btn-add-admin"><i class="fas fa-plus"></i> Voeg Beheerder toe.</button>
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Beheerders</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php foreach($user->getUsers() as $users){
                                echo "
                                <tr>
                                    <td><td><img src='../assets/img/user.png' class='img-fluid float-left' style='height: 100px'></td></td>
                                    <td>Name: ".$users['userName']."<br>
                                        E-mail: ".$users['userEmail']."<br>
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
</html>