<?php
include_once ("tamplates/header.php");
require_once ("../app/session/CheckRights.php");
require_once ("../app/matches/matchesManager.php");
?>
<div class="page-title">
    <h2>Start Game</h2>
</div>
<div class="wrapper wrapper_page">
    <h3 class="column-center">Games open for you to start.</h3>
    <?php
    $response = \app\getMatches("F", true);
    if ($response != null)
    {
        echo "<p>".$response."</p>";
    }
    ?>
</div>