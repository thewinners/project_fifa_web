<?php
include_once("tamplates/header.php");

echo "<div class=\"wrapper wrapper_page\">";

    echo "<form action='../app/login/PasswordReset.php' method='post'>
            <div class='group-form'>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' class='textarea' required>
            </div>
            <div class='group-form'>
                <input type='submit' value='Reset Password' class='button'>
            </div>
        </form>";

include_once("tamplates/footer.php");
echo "</div>";
?>