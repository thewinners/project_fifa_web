<?php
namespace App;

require_once (__DIR__."/../DatabaseConnector.php");

/*
 * 1 == Teamcaptain
 *
 * 2 == Superadmin
 *
 * 3 == Scheidsrechter
 *
 * 4 == Player
 *
 * */

function UpdateUser()
{
    $dbc = Connect();
    $sql = "SELECT * FROM `tbl_users` WHERE `id` = ".$_SESSION["user_id"];
    $user = $dbc->query($sql)->fetch();

    $_SESSION["team_rights"] = $user["teamrights"];
}


