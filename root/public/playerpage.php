<?php
require_once(__DIR__."/../app/players/fetchPlayer.php");

    if(isset($_SESSION["playerId"])){
        $player = fetchPlayer($_SESSION["playerId"]);

        echo $player;
    }

