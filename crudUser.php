<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 25-3-2018
 * Time: 22:30
 */


function MyAutoload($strClass)  //autoloader die de classes laad
{
    require_once('classes/'.$strClass.'.php');
}
spl_autoload_register("MyAutoload");

//$colums = array("*");
//$getAllUsers = new Crud("user", $colums);
//$getAllUsers = $getAllUsers->selectFromTable();

$colums = array("*");
$getAllUsers = new User("user", $colums);
$getAllUsers = $getAllUsers->getUsers();


$colums = array("*");
$getAllRoles = new Crud("user_role", $colums);
$getAllRoles = $getAllRoles->selectFromTable();


if (isset($_POST['submitUser']))
{
    // $colums = array("userRoleID", "userName", "userPassword", "userEmail");
    // $values = array("2",$_POST['userName'], $_POST['passWord'], $_POST['email']);
    // $insertInto = new Crud("user", $colums, "", "", "", $values);
    // $insertInto = $insertInto->insertIntoTable();
    $colums = array("userRoleID", "userName", "userPassword", "userEmail");
    $values = array($_POST['userRole'] ,$_POST['userName'], $_POST['passWord'], $_POST['email']);
    $newUser = new User("user", $colums, "", "", "", $values);
    $newUser = $newUser->createUser();
    header("Location: crudUser.php");
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
    <title>CRUD</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<h1>Create User</h1>
<p>Fill in</p>
<form method="POST">
    Email:<br>
    <input type="email" name="email" required><br>
    PassWord:<br>
    <input type="password" name="passWord" required><br>
    User Name:<br>
    <input type="text" name="userName" required><br>
    <select name='userRole' required>
        <?php
        foreach ($getAllRoles as $item)
        {
            $userRoleID = $item['userRoleID'];
            $userRoleName = $item['userRoleName'];

       echo "<option  value=$userRoleID>$userRoleName</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit" name="submitUser">
</form>

</body>
</html>

<h1>Read User</h1>
<div id="table">
    <table class="table table-responsive table-striped">
        <tbody>
        <tr>
            <th>ID</th>
            <th>RoleID</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($getAllUsers as $item)
        {

            $userID = $item['userID'];
            $userRoleID = $item['userRoleID'];
            $userName = $item['userName'];
            $userPassword = $item['userPassword'];
            $userEmail = $item['userEmail'];

            echo "<tr>";
            echo "<td>" . $userID . "</td>";
            echo "<td>" . $userRoleID . "</td>";
            echo "<td>" . $userName . "</td>";
            echo "<td>" . $userPassword . "</td>";
            echo "<td>" . $userEmail . "</td>";
            echo "<td>
                         <form action='updateUser.php?id=$userID' method='POST'>
                          <input type='submit' name='updateNextPage' value='update'></input>
                          </form>
              </td>";
            echo "<td>
                        <form onsubmit=\"return confirm('Do you really want to delete this user: $userName?');\" action='crudUser.php?id=$userID' method='post'>
                          <input  type='submit' name='deleteSend' value='delete'></input>
                          </form>
              </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
