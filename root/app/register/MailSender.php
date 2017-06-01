<?php
require_once(__DIR__."/../DatabaseConnector.php");

function SendMail($name, $email, $password, $hash)
{
    $to = $email; // Send email to our user
    $subject = 'Project Fifa | Verification'; // Give the email a subject
    $msg = "Hello $name,\n\n 
    
    Thanks for signing up!\n
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.\n
    
    ------------------------------------------------------------------------\n
    Login email: $email\n
    Password: $password
    ------------------------------------------------------------------------\n\n
    
    Please click this link to activate your account and set your password:\n
    http://www.joostlont.com/project_fifa/public/verify.php?email=$email&hash=$hash
    "; //Email msg

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,100);

    $headers = 'From:noreply@joostlont.com' . "\r\n"; // Set from headers
    mail($to, $subject, $msg, $headers); // Send our email
}


function SendPassMail($email)
{
    $sql = "SELECT * FROM `tbl_users` WHERE `email` = '$email';";
    $user = \App\Connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $hash = $user[0]['hash'];
    $link = "http://www.joostlont.com/project_fifa/public/ChangePassword.php?email=$email&hash=$hash";
    $name = $user[0]['username'];

    $to = $email; // Send email to our user
    $subject = 'Project Fifa | Password'; // Give the email a subject
    $msg = "Hello $name,\n\n 
    
    Your password has been reset.\n
    ------------------------------------------------------------------------\n
    Click this link to change your password: $link
    ------------------------------------------------------------------------\n\n
    "; //Email msg

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    $headers = 'From:noreply@joostlont.com' . "\r\n"; // Set from headers
    mail($to, $subject, $msg, $headers); // Send our email
}
?>
