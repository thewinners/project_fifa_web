<?php
include_once ("tamplates/header.php");
require_once ("../app/pools/PoolManager.php");
require_once ("../app/ladder/LadderManager.php");

\App\fillLadder();

$pointsTotal = 0;
?>
<div class="page-title">
    <h2>ladder</h2>
</div>
<div class="wrapper wrapper_page">
    <h3 class="column-center">Pools</h3>
    <div class="pools column-spaced">
        <div class="pool1">
            <ul>
                <li class='column-spred'><p>Team</p><p>Points</p></li>
                <?php
                    \App\printPool(1);
                ?>
            </ul>
        </div>
        <div class="pool2">
            <ul>
                <li class='column-spred'><p>Team</p><p>Points</p></li>
                <?php
                \App\printPool(2);
                ?>
            </ul>
        </div>
        <div class="pool3">
            <ul>
                <li class='column-spred'><p>Team</p><p>Points</p></li>
                <?php
                \App\printPool(3);
                ?></ul>
        </div>
        <div class="pool4">
            <ul>
                <li class='column-spred'><p>Team</p><p>Points</p></li>
                <?php
                \App\printPool(4);
                ?>
            </ul>
        </div>
    </div>
    <?php
        $show = \App\showLadder();
        $games = \App\fillLadder();

        if ($show == true)
        {
            echo "
            <div class=\"ladder column-center\">
        <div class=\"final\">
            <div class=\"l1 block row-alignment-end\">
                <p>".$games['game1']['team1']."</p>
            </div>
            <div class=\"l2 block row-alignment-start\">
                <p>".$games['game1']['team2']."</p>
            </div>
            <div class=\"l3 block row-alignment-end\">
                <p>".$games['game3']['team1']."</p>
            </div>
            <div class=\"l4 block row-alignment-start\">
                <p>".$games['game3']['team2']."</p>
            </div>
        </div>
        <div class=\"final\">
            <div class=\"l5 block2 row-alignmentend\"></div>
            <div class=\"l6 block2 row-alignment-start\"></div>
        </div>
        <div class=\"final\">
            <div class=\"mid7 block\"></div>
            <div class=\"mid8 block  column-center\">
                <h1>Finals</h1>
            </div>
            <div class=\"mid9 block row-alignment-end\"></div>
            <div class=\"mid10 block row-alignment-start\"></div>
        </div>
        <div class=\"final\">
            <div class=\"r5 block2 row-alignment-end\"></div>
            <div class=\"r6 block2 row-alignment-start\"></div>
        </div>
        <div class=\"final\">
            <div class=\"r1 block row-alignment-end\">
                <p>".$games['game4']['team1']."</p>
            </div>
            <div class=\"r2 block row-alignment-start\">
                <p>".$games['game4']['team2']."</p>
            </div>
            <div class=\"r3 block row-alignment-end\">
                <p>".$games['game2']['team1']."</p>
            </div>
            <div class=\"r4 block row-alignment-start\">
                <p>".$games['game2']['team2']."</p>
            </div>
        </div>
    </div>
            ";
        }
        else
        {
            echo "<p class='group-form'>the pools are still going.</p>";
        }
    ?>
    <?php
    require_once ("tamplates/footer.php");
    ?>
</div>
