<?php
namespace App;

require_once (__DIR__ . "/../DatabaseConnector.php");

function printPool($poolNumber)
{
    $poolTeams = fetchPool($poolNumber);

    foreach ($poolTeams as $key => $row)
    {
        $points[$key] = $row['points'];
    }
    if (isset($points)) {
        array_multisort($points, SORT_DESC, $poolTeams);

        foreach ($poolTeams as $poolTeam) {
            echo "<li class='column-spred'><p>" . $poolTeam['name'] . "</p><p>" . $poolTeam['points'] . "</p></li>";
        }

    }
}

function fetchPool($poolNumber)
{
    $dbc = Connect();
    $sql = "SELECT `name`,`points` FROM `tbl_teams` WHERE `poule_id` =".$poolNumber;
    $poolTeams = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    return $poolTeams;
}