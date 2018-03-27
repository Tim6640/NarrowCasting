<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 22/02/2018
 * Time: 15:08
 */

class Login extends Crud
{


    //Method.
    public function loginVerification($userEmail, $userPassword)
    {
        $getUserInfo = $this->selectFromTable();
        foreach ($getUserInfo as $item)
        {
            $email = $item['userEmail'];
            $password = $item['userPassword'];
            $username = $item['userName'];


        if($email == $userEmail)
        {
            $password = $password;
            if (password_verify($userPassword, $password))
            {
                echo "<script> alert('correct'); </script>";
                return array('username' => $username);
            }
            else
            {
                echo "<script> alert('Deze gegevens bestaan of kloppen niet.'); </script>";
                return false;
                die();
            }
        }
            else
            {
                echo "<script> alert('Deze gegevens bestaan of kloppen niet.'); </script>";
                return false;
                die();
            }
        }
        if($getUserInfo == NULL)
        {
            echo "<script> alert('Deze gegevens bestaan of kloppen niet.'); </script>";
            return false;
            die();
        }

    }


}
