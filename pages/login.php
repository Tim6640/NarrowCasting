<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 23-3-2018
 * Time: 08:48
 */

session_start();
$title = basename(__FILE__, '.php');

//include_once ($_SERVER["DOCUMENT_ROOT"]."/autoload.php");
//include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");
include_once ("../autoload.php");
include_once ("../includes/header.php");

if(isset($_SESSION['login']))
{
    header("Location: ../CMS/dashboard.php");
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
        header("Location: ../CMS/cms.php");
//        $_SERVER["DOCUMENT_ROOT"]."CMS/cms.php";
//        exit;
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
        <h2 class="form-signin-heading">Log in beheerder</h2>
        <label for="inputEmail" class="sr-only">Email adres</label>
        <input type="email" name="userEmail" class="form-control" placeholder="Email@gmail.com" required="" autofocus=""><br>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" name="userPassword" class="form-control" placeholder="*******" required=""><br>
        <input type="submit" value="Log in" class="btn btn-lg btn-primary btn-block" name="sendVerification">
    </form>
</div>

</body>