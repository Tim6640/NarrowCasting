<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 13-3-2018
 * Time: 09:29
 */


class User extends Crud
{
    //properties
//    private $prop_userName;
//    private $prop_userEmail;
//    private $prop_userPassword;
//    private $prop_userRole;

    //constructor NIET NODIG WANT IK EXTEND DE PARENT NAAR DE CHILD IK HEB DE PARENT CONSTRUCTOR NODIG!
//     public function __construct($table, $columns, $values)
//     {
//         $this->setPropTable($table);
//         $this->setPropColumns($columns);
//         $this->setPropValue($values);
// //        $this->setPropUserName($userName);
// //        $this->setPropUserEmail($userEmail);
// //        $this->setPropUserPassword($userPassword);
// //        $this->setPropUserRole($userRole);
//     }


    public function createUser()
    {
        $values = $this->getPropValue();
        $passwordHash = $values[2];
        $emailCheck = $values[3];
        $hashedPassword = password_hash($passwordHash, PASSWORD_BCRYPT);
        $values[2] = $hashedPassword;

        $email = filter_var($emailCheck, FILTER_SANITIZE_EMAIL);
//        var_dump($email);

        $colums = array("userEmail");
        $where="userEmail";
        $whereConditions = $email;
        $getUserEmail = new User("user", $colums, $where, $whereConditions);
        $getUserEmail = $getUserEmail->getUsers();

//        var_dump($getUserEmail);
// Validate e-mail
        if (!$getUserEmail == $email) {

            echo "$email is not in our records.";

            $this->setPropValue($values);
            $this->insertIntoTable();

            header( "refresh:5;url=index.php" );
            die();
        }
        else {

             echo "$email is already in our records." ;

            header( "refresh:5;url=index.php" );
             die();
        }

//      var_dump($hashedPassword);
//      var_dump($email);
//      echo "<br>";
//        var_dump($values);
/*
        if (password_verify('password', $hashedPassword)) {
            echo '<br>Password is valid!';
        } else {
            echo 'Invalid password.';
        }*/
    }

    public function getUsers()
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
