<?php
namespace App;

class DataValidator
{
    public function Validate($email, $username, $studentNumber, $dbc)
    {
        if (!eregi("^[_a-z0-9-]+([_a-z0-9-]+)*@[a-z0-9-]+([a-z0-9-]+)*([a-z]{2,3})$", $email))
        {
            //Checks if data if password meets the requirements
            //Checks if the Username, Email and studentnumber is already in use, if yes they are not able to register.
            $errors = [];

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
        else
        {
            $errors[] = "Invalid email.";
            return $errors;
        }
    }
}
?>