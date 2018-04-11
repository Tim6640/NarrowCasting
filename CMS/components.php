<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = "Componenten";
include_once("../includes/cmsHeader.php");
$component = new Component();

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
        $('#showComponent').DataTable( {
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
                        <button class="btn-add-component"><i class="fas fa-plus"></i> Voeg component toe.</button>
                        <h3 class="panel-title"><i class="fa fa-puzzle-piece"></i> Componenten</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped" id="showComponent" name="showComponent">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Component naam</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($component->getComponents() as $components){
                                echo "
                                <tr>
                                    <td><img src='../assets/img/Microcontrolller-01-512.png' class='img-fluid float-left' style='height: 100px'></td>
                                    
                                    <td>".$components['componentName']."</td>
                                    <td>".$components['componentActive']."</td>
                                        <td><button class='btn-options'><i class='fas fa-pencil-alt'></i> Wijzig</button></td>
                                        <td><button class='btn-delete'><i class='far fa-trash-alt'></i> Verwijder</button</td>
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