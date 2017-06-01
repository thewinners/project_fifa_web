<?php
require_once(__DIR__."/../DatabaseConnector.php");

function fetchPlayer($playerId)
{
    $sql = "SELECT * FROM `tbl_players` WHERE `id` = '$playerId'";
    $playerDetails = \App\Connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $playerDetails;
}
function fetchPlayerSN($studentNumber)
{
    $sql = "SELECT * FROM `tbl_players` WHERE `student_id` = '$studentNumber'";
    $playerDetails = \App\Connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $playerDetails;
}