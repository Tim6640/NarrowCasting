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


        if($email == $userEmail)
        {
            $password = $password;
            if (password_verify($userPassword, $password))
            {
                echo "<script> alert('correct'); </script>";
//                return array('id' => $data['klantID'], 'vNaam' => $data['klantVoorNaam'], 'aNaam' => $data['klantAchterNaam']);
            }
            else
            {
                echo "<script> alert('wrong'); </script>";
                return false;
            }
        }
            else
            {
                echo "<script> alert('wrong'); </script>";
                return false;
            }
        }
        if($getUserInfo == NULL)
        {
            echo "<script> alert('wrong'); </script>";
            return false;
        }

    }


}
