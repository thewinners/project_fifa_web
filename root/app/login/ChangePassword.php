<?php
require_once(__DIR__."/../DatabaseConnector.php");

if ($_SERVER["REQUEST_METHOD"] = $_POST)
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password == $confirmPassword)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `tbl_users` SET `password` = '$hashedPassword' WHERE `email` = '$email'";
        \App\Connect()->query($sql);
    }
    header("location: ../../public/index.php");
}