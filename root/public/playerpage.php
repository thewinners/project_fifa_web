<?php
require_once(__DIR__."/../app/players/fetchPlayer.php");

if (isset($_GET["id"]))
{
    $playerId = $_GET["id"];
    $player = fetchPlayer($playerId);

}