<?php
namespace App;

require_once (__DIR__ . "/../DatabaseConnector.php");


if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    if (isset($_GET["teamId"]))
    {
        $teamId = $_GET["teamId"];

        $dbc = Connect();
        $sql = "DELETE FROM `tbl_teams` WHERE `id` = '$teamId'";
        $dbc->query($sql);

        $sql = "UPDATE `tbl_users` SET `teamrights` = NULL WHERE `teamrights` = '$teamId'";
        $dbc->query($sql);

        header("location: ../../public/teams.php");
    }
}

