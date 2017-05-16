<?php
namespace App;

require_once(__DIR__."/../DatabaseConnector.php");

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    if (isset($_GET["playerId"]))
    {
        $playerId = $_GET["playerId"];

        $dbc = Connect();
        $sql = "DELETE FROM `tbl_players` WHERE `id` = '$playerId'";
        $dbc->query($sql);

        header("location: ../../public/players.php");
    }
}