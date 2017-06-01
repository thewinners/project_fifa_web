<?php
require_once(__DIR__."/../app/players/fetchPlayer.php");
include_once("tamplates/header.php");

    echo "<div class=\"wrapper wrapper_page\">";

        if(isset($_SESSION["playerId"])){
            $player = fetchPlayer($_SESSION["playerId"]);
            var_dump($player);

            echo "<h2>Player name:".$player[0]['name']."</h2>";

        }
        else{
            echo "<h3>You are not a player.</h3>";
        }
include_once("tamplates/footer.php");
echo "</div>";
?>