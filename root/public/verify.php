<?php
ini_set("display_errors", 1);

include_once("tamplates/header.php");
require_once("../app/register/VerifyChecker.php");

$msg = CheckDetails();
if (isset($_GET['email']) && !empty($_GET['email']))
{
    $email = $_GET['email'];
}
if ($msg == true)
{
    $message = "Your account has been activated, please change your password.";
}
else
{
    $message = "The url is either invalid or you already have activated your account.";
}
echo "<div class=\"wrapper wrapper_page\">";
echo "<h3 class='column-center' id='verify'>".$message."</h3>";
if ($msg == true)
{
    echo "<form action='../app/register/ChangePassword.php' method='post'>
            <div class='hidden'>
                <input type='email' id='email' name='email' class='textarea' required>
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
include_once("tamplates/footer.php");
echo "</div>";
?>