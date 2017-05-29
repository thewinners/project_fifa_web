<?php
namespace App;
use PDO;

require_once(__DIR__."/../config/DatabaseConfig.php");
function Connect()
{
    $dbc = new PDO("mysql:charset=utf8mb4;host=".DB_HOST.";dbname=".DB_NAME, DB_user, DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbc;
}
?>