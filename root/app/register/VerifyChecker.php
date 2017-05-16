<?php
require_once(__DIR__."../DatabaseConnector.php");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable

    $sql = ("SELECT `email`, `hash`, `active` FROM `tbl_users` WHERE `email`='".$email."' AND `hash`='".$hash."' AND `active`='0'");
    $match  = \App\Connect()->query($sql)->rowCount();

    if($match > 0)
    {
        // We have a match, activate the account
        $sql = "UPDATE `tbl_users` SET ``";
    }
    else
    {
        // No match -> invalid url or account has already been activated.

    }
}
else
{
    //invalid approach

}