<?php
require_once (__DIR__."/../register/MailSender.php");
require_once(__DIR__."/../register/DataSender.php");

function AccountMaker($first_name, $last_name, $email, $student_id)
{
    $name = $first_name." ". $last_name;
    $sender = new \app\DataSender($name, $email, $student_id, 4);

    $sender->Send();
}
