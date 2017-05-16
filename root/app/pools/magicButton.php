<?php
Namespace App;
session_start();

require_once (__DIR__."/PoulGenerator.php");
require_once  (__DIR__."/../matches/MatchesGenerator.php");

if ($_SESSION["rights"] == 2)
{
    $generator = new PoulGenerator();

    //$generator->poulMaker();
    $teams = $generator->shuffle_assoc($generator->fetchTeams());
    $generator->poulFiller($teams);
    GenerateMatches();
}
header("location: ../../public/matches.php");