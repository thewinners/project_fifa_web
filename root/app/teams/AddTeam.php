<?php
namespace App;
session_start();

require_once (__DIR__ . "/../DatabaseConnector.php");
require_once (__DIR__ . "/../session/CheckRights.php");

$dbc = Connect();
$teamName = $_POST["teamName"];

$sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$teamName'";
$total = $dbc->query($sql)->rowCount();

if($total == 0)
{
    $sql = "SELECT `teamrights` FROM `tbl_users` WHERE `id` = ".$_SESSION['user_id']; //checks if user already has a team
    $hasRights = $dbc->query($sql)->fetch();

    if ($hasRights['teamrights'] == null) //if he has no team he gets the rights
    {
        $sql = "INSERT INTO `tbl_teams` (`name`) VALUE ('$teamName');";
        $dbc->query($sql);

        $sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = '$teamName';"; //checks if user already has a team
        $idarray = $dbc->query($sql)->fetch();
        $id = $idarray["id"];

        $sql = "UPDATE `tbl_users` SET `teamrights` = '$id' WHERE `id` = ".$_SESSION['user_id'];
        $dbc->query($sql);

        UpdateUser();
    }
}
else
{
    $_SESSION["error"] = "teamname is already in use";
}

header("location: ../../public/teams.php");
