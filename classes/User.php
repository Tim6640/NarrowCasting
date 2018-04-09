<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 13-3-2018
 * Time: 09:29
 */
/**
 * @User
 * This class extends Crud.
 * It inheritance it's constructor, getters and setter and Public Methods.
 */

class User extends Crud
{
    public function __construct()
    {
        $columns = array("*");
        parent::__construct("user", $columns);
    }
/**
     * @createUser
     * This method insert values into the given table and column. This information can be found in the instance.
     * @example
     *  $table = "[TABLE]"
        $colums = array("[VALUES]", "[VALUES]");
        $values = array($_POST[VALUES] ,$_POST[VALUES], $_POST[VALUES], $_POST[VALUES]);
        $newUser = new User($table, $colums, "", "", "", $values);
        $newUser = $newUser->createUser();
*/
    public function createUser()
    {
        $values = $this->getPropValue(); //get all the values
        $passwordHash = $values[2]; //put value 3 into the var
        $emailCheck = $values[3]; //put value 4 into the var
        $hashedPassword = password_hash($passwordHash, PASSWORD_BCRYPT); //hash the password
        $values[2] = $hashedPassword; //values 2 is the hashed password

        $email = filter_var($emailCheck, FILTER_SANITIZE_EMAIL); //this cleans the email

        $colums = array("userEmail");
        $where="userEmail";
        $whereConditions = $email;
        $getUserEmail = new User("user", $colums, $where, $whereConditions);
        $getUserEmail = $getUserEmail->getUsers();

// Validate e-mail
        if (!$getUserEmail == $email) {

            echo "$email is not in our records and will be added.";

            $this->setPropValue($values);
            $this->insertIntoTable();

            header( "refresh:7;url=crudUser.php" );
            die();
        }
        else {

             echo "$email is already in our records." ;

            header( "refresh:7;url=crudUser.php" );
             die();
        }
    }
/**
     * @getUser
     * This method selects data from the given table and column. This information can be found in the instance.
     * @example
     * $table = "[TABLE]"
    $colums = array("[COLUMNS]", "[COLUMNS]");
    $getAllUsers = new User($table, $colums);
    $getAllUsers = $getAllUsers->selectFromTable();
    $getAllUsers = $getAllUsers->getUsers();
*/
    public function getUsers()
    {
        return $this->selectFromTable();
    }
/**
     * @updateUser
     * This method updates data from the given value. This information can be found in the instance.
     * @example
     *  $table = "[TABLE]"
        $colums = array("[COLUMNS]");
        $values = array($_POST[VALUES]);
        $where="[WHERE]";
        $whereConditions = $_GET[VALUES];
        $updateInto = new User($table, $colums, $where, $whereConditions, "", $values);
        $updateInto = $updateInto->updateUser();
*/
    public function updateUser()
    {
        $values = $this->getPropValue();
        $passwordHash = $values[0];
        $hashedPassword = password_hash($passwordHash, PASSWORD_BCRYPT);
        $values[0] = $hashedPassword;

        $this->setPropValue($values);
        $this->updateIntoTable();
        header("Location: crudUser.php");
        die();
    }
    /**
     * @deleteUser
     * This method deletes data from the given table, where and whereCondition. This information can be found in the instance.
     * @example
     *  $table = "[TABLE]"
        $colums = array("[COLUMN]");
        $where="[VALUES]";
        $whereConditions = $_GET[VALUES];
        $deleteUser = new User($table, $colums, "$where", "$whereConditions", "", "");
        $deleteUser = $deleteUser->deleteUser();
     */
    public function deleteUser()
    {
        $this->deleteFromTable();
    }


}
