<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 22/02/2018
 * Time: 15:08
 */
/**
 * @Login
 * This class extends Crud.
 * It inheritance it's constructor, getters and setter and Public Methods.
 */
class Login extends Crud
{
    //Method.
/**
     * @loginVerification
     * This method checks if the login is valid. This information can be found in the instance.
     * @example
            $table = "user";
            $colums = array("[COLUMN]");
            $where="[WHERE]";
            $whereConditions = $_POST[VALUES];
            $loginVerification = new Login($table, $colums, "$where", $whereConditions, "", "");
            $loginVerification = $loginVerification->loginVerification($_POST['userEmail'], $_POST['userPassword']);
*/
    public function loginVerification($userEmail, $userPassword)
    {
        $getUserInfo = $this->selectFromTable();
        foreach ($getUserInfo as $item)
        {
            $email = $item['userEmail'];
            $password = $item['userPassword'];
            $username = $item['userName'];


        try {
            if($email == $userEmail) {
                $password = $password;
                if (password_verify($userPassword, $password)) {
                    echo "<script> alert('correct'); </script>";
                    return array('username' => $username);
                }
            }
        } catch (Exception $e) {
                echo 'Ingevulde gegevens kloppen of bestaan niet. ',  $e->getMessage(), "\n";
            }

        }

    }


}
