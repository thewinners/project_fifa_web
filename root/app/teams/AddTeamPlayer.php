<?php
require_once (__DIR__."/../DatabaseConnector.php");

$studentNumber = $_POST["studentNumber"];
$teamId = $_POST["teamId"];
$dbc = \App\Connect();

$sql = "UPDATE `tbl_players` SET `team_id` = '$teamId' WHERE `student_id` = '$studentNumber'";
$dbc->query($sql);

header("location: ../../public/team.php?id=$teamId");

