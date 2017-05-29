<?php
require_once(__DIR__."/../DatabaseConnector.php");

function checkDetails()
{
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        // Verify data
        $email = $_GET['email']; // Set email variable
        $hash = $_GET['hash']; // Set hash variable

        $sql = "SELECT `email`, `hash`, `active` FROM `tbl_users` WHERE `email`='".$email."' AND `hash`='".$hash."' AND `active` = '0';";
        $match  = \App\Connect()->query($sql)->rowCount();

        if($match > 0)
        {
            // We have a match, activate the account
            $sql = "UPDATE `tbl_users` SET `active` = '1' WHERE `email` = '$email' AND `hash` = '$hash' AND active = '0';";
            \App\Connect()->query($sql);
            return true;
        }
        else
        {
            // No match -> invalid url or account has already been activated.
            return false;
        }
    }
    else
    {
        //invalid approach
        return "Invalid approach, please use the link that has been send to your email.";
    }
}