<?php

include_once ("tamplates/header.php");
require_once("../app/teams/TeamsManager.php");
require_once("../app/players/player.php");
?>

<div class="page-title">
    <h2>Players</h2>
</div>
<div class="wrapper wrapper_page">
        <?php
            echo players();
        ?>
    <div class="group-form">
        <?php
        if (isset($_SESSION["logged"]))
        {
            echo "<a href='addPlayer.php' class='button'>Add Player</a>";
        }
        ?>
    </div>
    <?php
    require_once ("tamplates/footer.php");
    ?>
</div>

