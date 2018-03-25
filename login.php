<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 23-3-2018
 * Time: 08:48
 */

include "includes/header.php";

function MyAutoload($strClass)
{
    require_once('classes/'.$strClass.'.php');
}
spl_autoload_register("MyAutoload");

if(isset($_POST['sendVerification']))
{
$table = "user";
$colums = array("*");
$where="userEmail";
$whereConditions = $_POST['userEmail'];
$loginVerification = new Login($table, $colums, "$where", $whereConditions, "", "");
$loginVerification = $loginVerification->loginVerification($_POST['userEmail'], $_POST['userPassword']);
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