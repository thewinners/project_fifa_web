<?php
function SendMail($name, $email, $studentNumber, $password, $hash)
{
    $to = $email; // Send email to our user
    $subject = 'Project Fifa | Verification'; // Give the email a subject
    $msg = "Hello $name,\n\n 
    
    Thanks for signing up!\n
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.\n
    
    ------------------------\n
    Login email: '.$email.'\n
    Password: '.$password.'\n
    Studentnumber: '.$studentNumber.'\n
    ------------------------\n\n
    
    Please click this link to activate your account:\n
    http://www.joostlont.com/public/verify.php?email='.$email.'&hash='.$hash.'
    "; //Email msg

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    $headers = 'From:noreply@joostlont.com' . "\r\n"; // Set from headers
    mail($to, $subject, $msg, $headers); // Send our email
}
?>