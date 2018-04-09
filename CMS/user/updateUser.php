<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 13-3-2018
 * Time: 11:45
 */
$title = basename(__FILE__, '.php');

include_once ($_SERVER["DOCUMENT_ROOT"]."/autoload.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");

//$colums = array("userRoleID", "userName", "userPassword", "userEmail");
//$values = array("1", "Christian", "password", "hoi5@gmail.com");
//$test = new User("user" ,$colums, "", "", "", $values);
//$test = $test->createUser();

if(isset($_GET['id']))
{
    $colums = array("userName", "userPassword");
    $where="userID";
    $whereConditions = $_GET['id'];
    $readSpecific = new User("user", $colums, "$where", "$whereConditions", "", "");
    $readSpecific = $readSpecific->getUsers();
//    var_dump($readSpecific);
}

if (isset($_POST['updateSend']))
{
    $colums = array("userPassword");
    $values = array($_POST['passWord']);
    $where="userID";
    $whereConditions = $_GET['id'];
    $updateInto = new User("user", $colums, $where, $whereConditions, "", $values);
    $updateInto = $updateInto->updateUser();
}
?>
<body>
<div class="container">
    <h1>Update User</h1>
    <p>Fill in</p>
            <form method="POST">
                  <?php
                  foreach ($readSpecific as $value) {

                    $valueUserName = $value['userName'];
                    $valuePassword = $value['userPassword'];

                    echo "
                    Username:<br>
                    <label for='username'>$valueUserName</label><br>
                    Oude wachtwoord:<br>
                    <input type='password' name='oldPassWord' required><br>
                            <label>Nieuw wachtwoord:</label><br>
                            <input id=\"password\" type=\"password\" name=\"passWord\" placeholder=\"**********\" required><br>
                            <label>Verifiëer nieuw wachtwoord:</label><br>
                            <input id=\"confirm_password\" type=\"password\" name=\"passWordCheck\" placeholder=\"**********\" required><br>
                            <span id='message'></span><br>
                    <input type='submit' value='Update' name='updateSend'>
                    ";
                      }
                    ?>
            </form>
    <form method="POST" action="crudUser.php">
        <input type='submit' value='Terug naar het overzicht' name='returnView'>
    </form>
</div>

</body>
<script src="../../assets/js/passwordCheck.js"></script>
<?php
//var_dump($testUpdate);
//
// $colums = array("userRoleID", "userName", "userPassword", "userEmail");
// $values = array("2",$_POST['userName'], $_POST['passWord'], $_POST['email']);
// $insertInto = new Crud("user", $colums, "", "", "", $values);
// $insertInto = $insertInto->insertIntoTable();
?>


