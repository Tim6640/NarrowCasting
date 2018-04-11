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
    session_unset();
    session_destroy();
    header("Location: ../pages/login.php");
    die();
}

?>
<script>
    $(document).ready(function() {
        $('#showUsers').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
            }
        } );
    } );
</script>
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
                        <table class="table table-striped" id="showUsers" name="showUsers">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Naam</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($user->getUsers() as $users){
                                echo "
                                <tr>
                                    <td><img src='../assets/img/user.png' class='img-fluid float-left' style='height: 100px'></td>
                                    
                                    <td>".$users['userName']."</td>
                                    <td>".$users['userEmail']."</td>
                                        <td><button class='btn-edit'><i class='fas fa-pencil-alt'></i> Wijzig</button></td>
                                        <td><button class='btn-delete'><i class='far fa-trash-alt'></i> Verwijder</button></td>
                                </tr>";
                            } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</html>