<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 27-3-2018
 * Time: 14:29
 */
//session_start();
$breadCrumb = "Apparaten";
include_once("../includes/cmsHeader.php");
$device = new Device();

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

if(isset($_POST['submitDevice']))
{
    $deviceName = $_POST['deviceName'];
    $device = new Device();
    $addDevice = $device->createDevice($deviceName);
    header("Location:devices.php");

}

?>

<script>
    $(document).ready(function() {
        $('#showDevices').DataTable( {
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
                        <button class="btn-add-screen" data-toggle="modal" data-target="#myModal" ><i class="fas fa-plus" ></i> Koppel nieuw scherm.</button>
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Apparaten</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped" id="showDevices" name="showDevices">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Apparaat Naam</th>
                                <th>MAC adres</th>
                                <th>Componenten actief</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($device->getDevices() as $devices){
                                echo "
                                <tr>
                                    <td><img src='../assets/img/screen.png' class='img-fluid float-left' style='height: 100px'></td>
                                    
                                    <td>".$devices['deviceName']."</td>
                                    <td>".$devices['deviceMacAddress']."</td>
                                        <td>123</td>
                                        <td>knop wijzig</td>
                                        <td>knop verwijder</td>
                                </tr>";
                                } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Voeg apparaat toe</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="createDevice" name="createDevice" action="devices.php">
                        <label>Apparaat Naam:</label><br>
                        <input type="text" name="deviceName" placeholder="Laptop Elmo" required><br><br>
                        <input type="submit" id="submitDevice" name="submitDevice" class="btn btn-md btn-primary" value="Apparaat Toevoegen">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="submit" data-dismiss="modal">Annuleer</button>
<!--                    <button type="button" id="submitForm" class="btn btn-default">Apparaat Toevoegen</button>-->
                </div>
            </div>

        </div>
    </div>
    </div>

</section>
