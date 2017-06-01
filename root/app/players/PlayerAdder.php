<?php
require_once(__DIR__."/../DatabaseConnector.php");
require_once (__DIR__."/../register/PlayerRegister.php");

if (isset($_POST['student_id']) && isset($_POST['first_name']) && $_POST['last_name'] && $_POST['email'])
{
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `tbl_players` (`student_id`, `first_name`, `last_name`) VALUES ('$student_id', '$first_name','$last_name')";
    $dbc = \App\Connect();
    $dbc->query($sql);

    AccountMaker($first_name, $last_name, $email, $student_id);
}
header("location: ../../public/addPlayer.php")
?>