<?php
    include_once ("tamplates/header.php");
    require_once ("../app/session/CheckRights.php");
    require_once ("../app/matches/matchesManager.php");
    require_once ("../app/pools/PoulGenerator.php");
?>
<div class="page-title">
    <h2>Matches</h2>
</div>
<div class="wrapper wrapper_page">
    <div class="navbar footer column-spaced">
        <ul class="column-spred">
            <?php
            if(!\app\PoolsMade())
            {
                if ($_SESSION["rights"] == 2){
                    echo "<a href='../app/pools/magicButton.php'>Generate</a>";
                }
            }
            ?>
            <li><a href="ladder.php">Ladder</a></li>
            <li><a href="#planed">Planned games</a></li>
            <li><a href="#played">Played games</a></li>
            <?php
            if (isset($_SESSION["logged"]))
            {
                \App\UpdateUser();
                if ($_SESSION["rights"] == "3") {
                    echo "<a href=\"startGames.php\"><li>Start games</li></a>";
                }
            }
            ?>
        </ul>
    </div>
    <h3 id="planed" class="column-center">Planned games</h3>
    <?php
    $response = \app\getMatches("F", true);
    if ($response != null)
    {
        echo "<p>".$response."</p>";
    }
    ?>
    <h3 id="played" class="column-center">Played games</h3>
    <?php
    $response = \app\getMatches("T", false);
    if ($response != null)
    {
        echo "<p>".$response."</p>";
    }
    ?>
    <?php include_once ("tamplates/footer.php")?>
</div>