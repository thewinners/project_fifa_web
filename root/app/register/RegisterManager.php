<?php
namespace App;

require_once("DataSender.php");

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
    session_start();
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $studentNumber = $_POST["studentNumber"];

    $sender = new DataSender($username, $email, $password, $confirmPassword, $studentNumber);
    $message = $sender->Send();

    if ($message != false)
    {
        $_SESSION["reg_error"] = $message;
    }
    else
    {
        $_SESSION["reg_succes"] = "Succesfully registered";
    }
}
else
{
    $_SESSION["reg_error"] = "Something went wrong, please try again.";
}
header("location: ../../public/register.php");
?>