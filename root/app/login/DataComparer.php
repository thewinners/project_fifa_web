<?php
namespace App;

require_once("../DatabaseConnector.php");

class DataComparer
{
    private $email;
    private $password;
    private $dbc;

    function __Construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->dbc = Connect();
    }

    function Compare()
    {
        require_once('../DatabaseConnector.php');

        //Checks if the username filled in form is in the db if yes checks if password is the same as the hashed one in db
        $sql = "SELECT * FROM `tbl_users` WHERE `email` = '$this->email';";
        $user = $this->dbc->query($sql)->fetch(\PDO::FETCH_ASSOC);
        $total = $this->dbc->query($sql)->rowCount();

        if($total > 0)
        {
            if(password_verify($this->password, $user['password']))
            {
                $_SESSION["error"] =  "Succesfully logged in.";
                $_SESSION["logged"] = true;
                $_SESSION["rights"] = $user["admin"];
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["team_rights"] = $user["teamrights"];
            }
            else
            {
                $_SESSION["error"] =  "Password is incorrect.";
            }
        }
        else
        {
            $_SESSION["error"] =  "username not found.";
        }
    }
}