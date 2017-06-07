<?php
include_once ("tamplates/header.php");

if (isset($_SESSION["logged"]))
{
    if ($_SESSION["rights"] == 2)
    {
        echo
        "<div class='page-title'>
            <h2>Register</h2>
        </div>";

        echo "<div class='wrapper wrapper_page'>";

        if (isset($_SESSION["reg_error"]))
        {
            foreach($_SESSION["reg_error"] as $error)
            {
                echo "<p>".$error."</p>";
            }
            unset($_SESSION["reg_error"]);
        }
        if (isset($_SESSION["reg_succes"]))
        {
            echo "<p>".$_SESSION["reg_succes"]."</p>";
            unset($_SESSION["reg_succes"]);
        }

        echo "<form action='../app/register/RegisterManager.php' method='post'>
            <div class='group-form'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='studentNumber'>Studentnumber:</label>
                <input type='text' id='studentNumber' name='studentNumber' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='adminrights'>Admin Rights:</label>
                <input list=\"datalist\" name=\"adminrights\" id='adminrights'>
                  <datalist id=\"datalist\">
                    <option value=\"1\">
                    <option value=\"2\">
                    <option value=\"3\">
                  </datalist>
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
