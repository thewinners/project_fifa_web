<?php
namespace App;

require_once (__DIR__ . "/../DatabaseConnector.php");

function fetchPlayers($idTeam)
{
    $dbc = Connect();
    $sql = "SELECT `id`, `first_name`, `last_name` FROM `tbl_players` WHERE `team_id` =".$idTeam;
    $players = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    return $players;
}