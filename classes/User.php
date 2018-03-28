<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 13-3-2018
 * Time: 09:29
 */


class User extends Crud
{
    public function __construct()
    {
        $columns = array("*");
        parent::__construct("user", $columns);
    }

    public function createUser($role, $name, $password, $email)
    {
        $values = $this->getPropValue();
        $passwordHash = $values[2];
        $emailCheck = $values[3];
        $hashedPassword = password_hash($passwordHash, PASSWORD_BCRYPT);
        $values[2] = $hashedPassword;

        $email = filter_var($emailCheck, FILTER_SANITIZE_EMAIL);

        $this->setPropColumns(array("userEmail"));
        $this->setPropWhere("userEmail");
        $this->setPropWhereConditions($email);
        $getUserEmail = $this->selectFromTable();

// Validate e-mail
        if (!$getUserEmail == $email) {

            echo "$email is not in our records.";

            $this->setPropColumns(array("userRoleID", "userName", "userPassword", "userEmail"));
            $this->setPropValue(array($role, $name, $hashedPassword, $email));
            $this->insertIntoTable();

            header( "refresh:5;url=index.php" );
            die();
        }
        else {

             echo "$email is already in our records." ;

            header( "refresh:5;url=index.php" );
             die();
        }
    }

    public function selectAllUsers()
    {
        return $this->selectFromTable();
    }

    public function updateUser()
    {
        $values = $this->getPropValue();
        $passwordHash = $values[0];
        $hashedPassword = password_hash($passwordHash, PASSWORD_BCRYPT);
        $values[0] = $hashedPassword;
//        if (password_verify('123', $hashedPassword)) {
//            echo '<br>Password is valid!';
//        } else {
//            echo 'Invalid password.';
//        }
        $this->setPropValue($values);
        $this->updateIntoTable();
        header("Location: index.php");
        die();
    }

    public function deleteUser()
    {
        $this->deleteFromTable();
    }


}
