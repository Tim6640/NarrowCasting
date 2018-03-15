<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 13-3-2018
 * Time: 11:45
 */

function MyAutoload($strClass)  //autoloader die de classes laad
{
    require_once('classes/'.$strClass.'.php');
}
spl_autoload_register("MyAutoload");



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
    $values = array($_POST['userPassWord']);
    $where="userID";
    $whereConditions = $_GET['id'];
    $updateInto = new User("user", $colums, $where, $whereConditions, "", $values);
    $updateInto = $updateInto->updateUser();
}
?>
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
                PassWord:<br>
                <input type='password' name='userPassWord' required><br>
                <input type='submit' value='Update' name='updateSend'>
                ";
                  }
                ?>
        </form>
<form method="POST" action="index.php">
    <input type='submit' value='return to Index' name='returnIndex'>
</form>
<?php
//var_dump($testUpdate);
//
// $colums = array("userRoleID", "userName", "userPassword", "userEmail");
// $values = array("2",$_POST['userName'], $_POST['passWord'], $_POST['email']);
// $insertInto = new Crud("user", $colums, "", "", "", $values);
// $insertInto = $insertInto->insertIntoTable();
?>


