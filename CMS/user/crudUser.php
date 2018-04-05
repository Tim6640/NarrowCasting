<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 25-3-2018
 * Time: 22:30
 */
session_start();
$title = basename(__FILE__, '.php');
if(!isset($_SESSION['login']))
{
    header("Location: ../../pages/login.php");
    die();
}

include_once("../../autoload.php");
include_once("../../includes/header.php");

$colums = array("*");
$where="userRoleID";
$whereConditions = "2";
$getAllUsers = new User("user", $colums, $where, $whereConditions);
$getAllUsers = $getAllUsers->getUsers();

if (isset($_POST['submitUser']))
{
    if ($_POST['passWord'] === $_POST['passWordCheck'])
    {
        $colums = array("userRoleID", "userName", "userPassword", "userEmail");
        $values = array("2" ,$_POST['userName'], $_POST['passWord'], $_POST['email']);
        $newUser = new User("user", $colums, "", "", "", $values);
        $newUser = $newUser->createUser();
        die();
    }
    else
        {
            echo '<script>alert("Wachtwoorden komen helaas niet overeen.");</script>';
        }

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

<head>
    <title>Beheer beheerders</title>


</head>
<body>
<div class="container-fluid">
    <form method="POST" action="../cms.php">
        <input type='submit' value='Terug naar het CMS' name='returnCMS'>
    </form>
    <h1>Creëer een beheerder</h1>
    <p>Vul de gegevens in</p>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Email@gmail.com" required><br>
        <label>Wachtwoord:</label><br>
        <input id="password" type="password" name="passWord" placeholder="**********" required><br>
        <label>Verifiëer wachtwoord:</label><br>
        <input id="confirm_password" type="password" name="passWordCheck" placeholder="**********" required><br>
        <span id='message'></span><br>
        <label>Naam:</label><br>
        <input type="text" name="userName" placeholder="Frits" required><br><br>

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

<script src="../../assets/js/passwordCheck.js"></script>

