<?php
require_once(__DIR__."/../DatabaseConnector.php");

function CheckAccValues($email, $hash)
{
    if(isset($email) && !empty($email) AND isset($hash) && !empty($hash))
    {
        $sql = "SELECT * FROM `tbl_users` WHERE `email` = '$email' AND `hash` = '$hash';";
        $total = \App\Connect()->query($sql)->rowCount();

        if ($total != 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        //invalid approach
        return false;
    }
}