<?php
include_once("tamplates/header.php");
require_once("../app/register/VerifyChecker.php");
$msg = CheckDetails();
if (isset($_GET['email']) && !empty($_GET['email']))
{
    $email = $_GET['email'];
}

echo "<div class=\"wrapper wrapper_page\">";
echo "<h3 class='column-center' id='verify'>".$msg."</h3>";

if ($msg == "Your account has been activated, please change your password.")
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