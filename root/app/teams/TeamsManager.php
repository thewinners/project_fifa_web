<?php
namespace App;

require_once (__DIR__."/../DatabaseConnector.php");

function fetchTeams()
{
    $dbc = Connect();
    $sql = "SELECT `id`,`name`, `wins`, `losses`, `draws`, `points` FROM `tbl_teams`";
    $teams = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    return $teams;
}
function fetchTeam($idTeam)
{
    $dbc = Connect();
    $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '$idTeam'";
    $team = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    return $team;
}