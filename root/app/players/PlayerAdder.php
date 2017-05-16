
<?php
require_once(__DIR__."/../DatabaseConnector.php");

$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sql = "INSERT INTO `tbl_players` (`student_id`, `first_name`, `last_name` ) 
VALUES ('$student_id', '$first_name','$last_name')";
$dbc = \App\Connect();
$dbc->query($sql);

header("location: ../../public/addPlayer.php")
?>
