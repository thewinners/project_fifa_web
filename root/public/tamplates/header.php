<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous">
    </script>
    <script src="javascript/login.js"></script>
    <title>Project Fifa</title>
</head>
<body>
<?php
session_start();
?>
<div class="wrapper">
    <header class="column-spaced">
        <div class="topnav topnavul">
            <ul class="column-spaced">
                <a href="index.php"><li>Home</li></a>
                <a href="players.php"><li>Players</li></a>
                <a href="teams.php"><li>Teams</li></a>
            </ul>
        </div>
        <div class="logo">
            <img src="img/logo.png" alt="logo_project_fifa">
        </div>
        <div class="topnav shortnav">
            <ul class="column-spaced topnavul">
                <a href="matches.php"><li>Matches</li></a>
                <?php
                if (isset($_SESSION["logged"]))
                {
                    if ($_SESSION["logged"])
                    {
                        echo "<a href='register.php'><li>Register</li></a>";
                        echo "<a href='../app/login/LoginManager.php'><li>Logout</li></a>";
                    }
                }
                else
                {
                    echo "<button onclick=\"openLogin()\">Login</button>";

                    echo "<div id='overlay' class='overlay' onclick=\"closeLogin()\"></div>";
                    echo "<div id=\"id01\" class=\"modal\">                              
                                <form class=\"modal-content animate\" action=\"../app/login/LoginManager.php\" method='post'>
                                    <div class='logcontainer'>
                                        <span onclick=\"closeLogin()\" class=\"close\" title=\"Close Login\">&times;</span>

                                        <div class=\"group-form\">
                                            <label for=\"email\">Email:</label>
                                            <input type=\"text\" id=\"email\" name=\"email\" class=\"textarea\">
                                        </div>
                                        <div class=\"group-form\">
                                            <label for=\"password\">Password:</label>
                                            <input type=\"password\" id=\"password\" name=\"password\" class=\"textarea\">
                                        </div>
                                        <div class=\"group-form\">
                                            <input type=\"submit\" value=\"Login\" class=\"button loginSubmit\">
                                        </div>
                                    </div>       
                                 </form>
                          </div>";
                }
                ?>
            </ul>
        </div>
    </header>
</div>
<?php
include_once ("javascript/clockphpjs.php");
?>