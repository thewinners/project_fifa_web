<?php
namespace App;

session_start();
require_once("DataComparer.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') //logout if send with GET method
{
    unset($_SESSION["logged"]);
    session_destroy();
    header("location: ../../public/index.php");
}

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && isset($_POST["email"]) && isset($_POST["password"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!eregi("^[_a-z0-9-]+([_a-z0-9-]+)*@[a-z0-9-]+([a-z0-9-]+)*([a-z]{2,3})$", $email))
    {
        $DataComparer = new DataComparer($email, $password);
        $DataComparer->Compare();
    }else{
        $_SESSION["error"] = "Invalid email";
    }
}else{
    $_SESSION["error"] = "Something went wrong, please try again";
}
header("location:" . $_SERVER['HTTP_REFERER'])
?>