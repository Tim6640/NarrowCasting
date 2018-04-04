<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 25-3-2018
 * Time: 22:30
 */
session_start();
include_once("../../autoload.php");
include_once("../../includes/header.php");

$colums = array("*");
$where="userRoleID";
$whereConditions = "2";
$getAllUsers = new User("user", $colums, $where, $whereConditions);
$getAllUsers = $getAllUsers->getUsers();

if (isset($_POST['submitUser']))
{
    $colums = array("userRoleID", "userName", "userPassword", "userEmail");
    $values = array("2" ,$_POST['userName'], $_POST['passWord'], $_POST['email']);
    $newUser = new User("user", $colums, "", "", "", $values);
    $newUser = $newUser->createUser();
    die();
}

if (isset($_POST['deleteSend']))
{
    $colums = array("userID");
    $where="userID";
    $whereConditions = $_GET['id'];
    $deleteUser = new User("user", $colums, "$where", "$whereConditions", "", "");
    $deleteUser = $deleteUser->deleteUser();
    header("Location: crudUser.php");
    die();
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Beheer beheerders</title>
 </head>
<body>
<div class="container-fluid">
    <h1>Creëer een beheerder</h1>
    <p>Vul de gegevens in</p>
    <form method="POST">
        Email:<br>
        <input type="email" name="email" placeholder="Email@gmail.com" required><br>
        Wachtwoord:<br>
        <input type="password" name="passWord" placeholder="**********" required><br>
        Naam:<br>
        <input type="text" name="userName" placeholder="Frits" required><br>

        <input type="submit" class="btn btn-md btn-primary" value="Maak de beheerder!" name="submitUser">
    </form>

    <h1>Beheerders in het systeem</h1>
    <div id="table">
        <table class="table table-responsive table-striped">
            <tbody>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            foreach ($getAllUsers as $item)
            {

                $userID = $item['userID'];
                $userName = $item['userName'];
                $userEmail = $item['userEmail'];

                echo "<tr>";
                echo "<td>" . $userName . "</td>";
                echo "<td>" . $userEmail . "</td>";
                echo "<td>
                             <form action='updateUser.php?id=$userID' method='POST'>
                              <input type='submit' name='updateNextPage' value='update'></input>
                              </form>
                  </td>";
                echo "<td>
                            <form onsubmit=\"return confirm('Wil je deze beheerder echt verwijderen: $userName');\" action='crudUser.php?id=$userID' method='post'>
                              <input  type='submit' name='deleteSend' value='delete'></input>
                              </form>
                  </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

