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

$email = $_POST["email"];
$password = $_POST["password"];
$DataComparer = new DataComparer($email, $password);
$DataComparer->Compare();

header("location:" . $_SERVER['HTTP_REFERER'])
?>