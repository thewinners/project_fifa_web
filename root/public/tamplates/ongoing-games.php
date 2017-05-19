<?php

function ongoing_games(){
    include_once ("../app/DatabaseConnector.php");

    $dbc = \App\Connect();

    $sql = "SELECT `id` FROM `tbl_matches` WHERE `ongoing` = \"T\";";
    $result = $dbc->query($sql)->rowCount();

    if ($result != null)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

function getTheGames()
{
/*
 * loop voor alle wetstrijden
 *
 * de score
 *
 * de tijd
 *
 * de extratijd
 *
 * wie er gescored heeft en hoelaat
 *
 */
}
