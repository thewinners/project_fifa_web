<?php
require_once ("../app/teams/TeamManager.php");
require_once ("../app/teams/TeamsManager.php");
require_once ("../app/teams/RemoveTeam.php");
if (isset($_GET["id"]))
{
    $teamId = $_GET["id"];
    $players = \app\fetchPlayers($teamId);
    $team = \app\fetchTeam($teamId);
}
    include_once ("tamplates/header.php");
?>
<div class="page-title">
    <h2><?php echo $team[0]["name"];?></h2>
</div>
<div class="wrapper wrapper_page">
    <h3>Spelers</h3>
    <ol>
        <?php
        $count = 1;
        foreach ($players as $player)
        {
            echo "<li>".$count.". ".$player["first_name"]." ".$player["last_name"]."</li>";
            $count++;
        }
        ?>
    </ol>
    <div class="column-spaced">
        <?php
        if (isset($_SESSION["logged"]))
        {
            if (isset($_SESSION["logged"]))
            {

                echo "<form action='../app/teams/AddTeamPlayer.php' method='post'>
                    <div class='group-form'>
                        <label for='studentNumber'>Studentnumber:</label>
                        <input type='text' id='studentNumber' name='studentNumber' class='textarea' required>
                    </div>
                    <input type='text' name='teamId' value='$teamId' class='hidden'>
                    <div class='group-form'>
                        <input type='submit' value='Add Player' class='button'>
                    </div>";
            }
        }
        ?>
    </div>
    <?php
    include_once ("tamplates/footer.php");
    ?>
</div>