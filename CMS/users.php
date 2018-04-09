<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
$breadCrumb = basename(__FILE__, '.php');
include_once("../includes/cmsHeader.php");
$user = new User();

?>

<section id="main">
    <div class="container">
        <div class="row">
            <?php include_once(__ROOT__."includes/cmsMenu.php") ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #095f59;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Users</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php foreach($user->getUsers() as $users){
                                echo "
                                <tr>
                                    <td><td><img src='../assets/img/screen.png' class='img-fluid float-left' style='height: 100px'></td></td>
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