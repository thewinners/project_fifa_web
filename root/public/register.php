<?php
include_once ("tamplates/header.php");

if (isset($_SESSION["logged"]))
{
    echo
    "<div class='page-title'>
            <h2>Register</h2>
        </div>
        <div class='wrapper wrapper_page'>
        <form action='../app/register/RegisterManager.php' method='post'>
            <div class='group-form'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password' class='textarea'>
            </div>
            <div class='group-form'>
                <label for='confirmPassword'>Confirm password:</label>
                <input type='password' id='confirmPassword' name='confirmPassword' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='studentNumber'>Studentnumber:</label>
                <input type='text' id='studentNumber' name='studentNumber' class='textarea' required>
            </div>
            <div class='group-form'>
                <input type='submit' value='Submit' class='button'>
            </div>
        </form>";
        require_once ("tamplates/footer.php");
        echo "</div>";
}
else
{
    echo
    "
        <div class='wrapper wrapper_page'>
            <h2 id='NoPermission'> No permission for this area.</h2>
        </div>
    ";
}
?>
