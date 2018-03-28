<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 23-3-2018
 * Time: 08:48
 */
session_start();
include "includes/header.php";
include_once("autoload.php");

if(isset($_SESSION['login']))
{
    header("Location: cms.php");
    exit;
}

if(isset($_POST['sendVerification']))
{
$table = "user";
$colums = array("*");
$where="userEmail";
$whereConditions = $_POST['userEmail'];
$loginVerification = new Login($table, $colums, "$where", $whereConditions, "", "");
$loginVerification = $loginVerification->loginVerification($_POST['userEmail'], $_POST['userPassword']);

    if ($loginVerification)
    {
        $_SESSION['login']=$loginVerification;
        header("Location: cms.php");
        exit;
    }
    else
    {
        echo"
          <script>alert ('login is onjuist') </script>
        ";
    }
}

?>

<body>
<div class="container">

    <form method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="userEmail" class="form-control" placeholder="Email address" required="" autofocus=""><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="userPassword" class="form-control" placeholder="Password" required=""><br>
        <input type="submit" value="Submit" class="btn btn-lg btn-primary btn-block" name="sendVerification">
    </form>
</div>

</body>