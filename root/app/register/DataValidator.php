<?php
namespace App;

class DataValidator
{
    public function Validate($email, $username, $password, $confirmPassword, $studentNumber, $dbc)
    {
        //Checks if data if password meets the requirements
        //Checks if the Username, Email and studentnumber is already in use, if yes they are not able to register.
        $errors = [];
        /*if (!preg_match('/^[A-Za-z0-9#,.\-_]*$/', $password))
        {
            $errors[] = 'Invalid characters used in password.';
        }
        if (strlen($password) < 7)
        {
            $errors[] = 'Password not long enough';
        }
        if (strlen(preg_replace('/[^0-9]/','',$password)) < 1)
        {
            $errors[] = 'No number found in password.';
        }
        if (strlen(preg_replace('/[^A-Z]/','',$password)) < 1)
        {
            $errors[] = 'No capital letter found in password.';
        }
        */
        if ($password != $confirmPassword)
        {
            $errors[] = "Passwords don't match.";
        }

        $sql = "SELECT `username` FROM `tbl_users` WHERE `username` = '$username';";
        $result = $dbc->query($sql)->rowCount();

        if ($result > 0)
        {
            $errors[] = "Username is already in use.";
        }

        $sql = "SELECT `email` FROM `tbl_users` WHERE `email` = '$email';";
        $result = $dbc->query($sql)->rowCount();

        if ($result > 0)
        {
            $errors[] = "Email is already in use.";
        }

        $sql = "SELECT `studentnumber` FROM `tbl_users` WHERE `studentnumber` = '$studentNumber';";
        $result = $dbc->query($sql)->rowCount();

        if ($result > 0)
        {
            $errors[] = "Studentnumber is already in use.";
        }

        if (count($errors) > 0) //if not valid
        {
            return $errors;
        }
        else //if valid
        {
            return false;
        }
    }
}
?>