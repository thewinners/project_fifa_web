<?php
include_once("tamplates/header.php");
require_once (__DIR__."/../app/login/PasswordResetVerify.php");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $msg = CheckAccValues($_GET['email'], $_GET['hash']);
}
else
{
    $msg = "Invalid approach, please use the link that has been send to your email.";
}

echo "<div class=\"wrapper wrapper_page\">";

    if ($msg == true)
    {
        $email = $_GET['email'];
        echo "<form action='../app/register/ChangePassword.php' method='post'>
                <div class='hidden'>
                    <input type='email' id='email' name='email' value='$email' class='textarea' required>
                </div>
                <div class='group-form'>
                    <label for='password'>Password:</label>
                    <input type='password' id='password' name='password' class='textarea' required>
                </div>
                <div class='group-form'>
                    <label for='confirmPassword'>Confirm Password:</label>
                    <input type='password' id='confirmPassword' name='confirmPassword' class='textarea' required>
                </div>
                <div class='group-form'>
                    <input type='submit' value='Change password' class='button'>
                </div>
            </form>";
    }
    else
    {
        echo "<h3>.$msg.</h3>";
    }


include_once("tamplates/footer.php");
echo "</div>";
?>