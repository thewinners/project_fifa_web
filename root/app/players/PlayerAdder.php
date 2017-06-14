<?php
session_start();

require_once(__DIR__."/../DatabaseConnector.php");
require_once (__DIR__."/../register/PlayerRegister.php");

if (isset($_POST['student_id']) && isset($_POST['first_name']) && $_POST['last_name'] && $_POST['email'])
{
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM `tbl_users` WHERE `studentnumber` = '$student_id'";
    $count = \App\Connect()->query($sql)->rowCount();
    if ($count == 0){
        $sql1 = "SELECT * FROM `tbl_players` WHERE `student_id` = '$student_id'";
        $count1 = \App\Connect()->query($sql1)->rowCount();
        if($count1 == 0)
        {
            $sql = "INSERT INTO `tbl_players` (`student_id`, `first_name`, `last_name`) VALUES ('$student_id', '$first_name','$last_name')";
            \App\Connect()->query($sql);
            AccountMaker($first_name, $last_name, $email, $student_id);
            $_SESSION["player_error"] = "Succesfully added player ".$first_name." " .$last_name;
        }else{
            $_SESSION["player_error"] = "Studentnumber already used";
        }
    }else{
        $_SESSION["player_error"] = "Studentnumber already used";
    }
}
header("location: ../../public/addPlayer.php")
?>