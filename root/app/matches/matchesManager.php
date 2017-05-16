<?php
namespace app;

include_once (__DIR__."/../DatabaseConnector.php");
include_once (__DIR__."/../teams/TeamsManager.php");

# I aspect a "T" or a "F" by $whichGame.
# $start = bool
function getMatches($whichGame, $start)
{
    if ($whichGame == "T" || $whichGame == "F")
    {
        $dbc = Connect();

        $sql = "SELECT * FROM `tbl_matches`";
        $total = $dbc->query($sql)->rowCount();

        if ($total != 0)
        {
            $sql = "SELECT `id`,`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `played` = '". $whichGame."';";
            $resultcount = $dbc->query($sql)->rowCount();
            $result = $dbc->query($sql)->fetchAll();

            if ($resultcount != 0)
            {
                printMatches($result, $whichGame, $start);
            }
            else
            {
                if ($whichGame == "T")
                {
                    return "There are no matches played yet..";
                }
                elseif ($whichGame == "F")
                {
                    return "All the matches are already played..";
                }
            }
        }
        else
        {
            return "There are no matches planned yet";
        }
    }
}

function printMatches($matches, $whichGame, $start)
{
    if ($start)
    {
        echo "<div class='column-spred'><p>Team A</p><p>VS</p><p>Team B</p><p>Start Game</p></div>";
        if ($whichGame == "F")
        {
            foreach ($matches as $match)
            {
                $team_a = fetchTeam($match["team_id_a"]);
                $team_b = fetchTeam($match["team_id_b"]);

                echo "<div class='column-spred'><p>".$team_a[0]['name']."</p><p>VS</p><p>".$team_b[0]['name']."</p><a class=\"button\" href=\"whilegame.php?id=".$match["id"]."\">Start game</a></div>";
            }
        }
    }
    else
    {
        echo "<div class='column-spred'><p class='teamA'>Team A</p><p class='score'>score</p><p class='teamB'>Team B</p></div>";
        if ($whichGame == "F")
        {
            foreach ($matches as $match)
            {
                $team_a = fetchTeam($match["team_id_a"]);
                $team_b = fetchTeam($match["team_id_b"]);

                echo "<div class='column-spred'><p class='teamA'>".$team_a[0]['name']."</p><p class='score'>?-?</p><p class='teamB'>".$team_b[0]['name']."</p></div>";
            }
        }
        elseif ($whichGame == "T")
        {
            foreach ($matches as $match)
            {
                $team_a = fetchTeam($match["team_id_a"]);
                $team_b = fetchTeam($match["team_id_b"]);

                echo "<div class='column-spred'><p class='teamA'>".$team_a[0]['name']."</p><p class='score'>".$match["score_team_a"]."-".$match["score_team_a"]."</p><p class='teamB'>".$team_b[0]['name']."</p></div>";
            }
        }
    }
}