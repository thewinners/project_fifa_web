<?php
session_start();
require_once(__DIR__."/../DatabaseConnector.php");
require_once(__DIR__."/../register/MailSender.php");

$email = $_POST["email"];

$sql = "SELECT * FROM `tbl_users` WHERE `email` = '$email'";
$total = \App\Connect()->query($sql)->rowCount();

if ($total != 0)
{
    SendPassMail($email);
    $_SESSION["msg"] = "Email has been sent.";
}
else
{
    $_SESSION["msg"] = "This email is not used.";
}

header("location= ../../public/resetPassword.php");