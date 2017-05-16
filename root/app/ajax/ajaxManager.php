<?php

include_once (__DIR__."/../DatabaseConnector.php");

/*  request 1 = get the time
 *
 *  request 2 = uploud the pauze time to the database
 *
 *  request 3 = get the pauze time to the database
 *
 *  request 4 = add a goal
 *
 *  request 5 = remove a goal
 *
 *  request 6 = score of team a and team b returnen
 *
 *  request 7 = get extra time
 *
 *  request 8 = uploud extra time
 * */

if (isset($_POST["request"]) && isset($_POST["id"]))
{
    $dbc = \App\Connect();
    if ($_POST["request"] == 1)
    {
        $sql = "SELECT `start_play_time` FROM `tbl_matches` WHERE `id` =".$_POST["id"];
        $result = $dbc->query($sql)->fetchAll();

        if ($result[0]['start_play_time'] != 0)
        {
            $start_time = $result[0]['start_play_time'];
            $time_now = time();
            $the_time = $time_now - $start_time;
            echo $the_time;
        }
        else
        {
            $time_now = time();
            $sql = "UPDATE `tbl_matches` SET `start_play_time`= ".$time_now." WHERE `id` = ".$_POST["id"];
            $dbc->query($sql);
            echo 0;
        }
    }

    elseif ($_POST["request"] == 2)
    {
        $time = time();
        $sql = "UPDATE `tbl_matches` SET `pauze_time_start` = ".$time." WHERE `id` =".$_POST["id"];
        $dbc->query($sql);
    }

    elseif ($_POST["request"] == 3)
    {
        $sql = "SELECT `start_play_time`, `pauze_time_start` FROM `tbl_matches` WHERE `id` =".$_POST["id"];
        $result = $dbc->query($sql)->fetchAll();

        if ($result[0]['start_play_time'] != 0)
        {
            $start_time = $result[0]['start_play_time'];
            $pauze_time = $result[0]['pauze_time_start'];
            $time_now = time();
            $the_time = $time_now - $start_time;
            $the_pauze = $time_now - $pauze_time;
            $the_time = $the_time - $the_pauze;
            echo $the_time;
        }
        else
        {
            echo 0;
        }
    }

    elseif ($_POST["request"] == 4)
    {
        $game_id = $_POST["id"];
        $player_id = $_POST["player"];
        $time = $_POST["time"];

        $team_id;

        $sql = "SELECT `team_id` FROM `tbl_players` WHERE `id`=".$player_id;
        $result = $dbc->query($sql)->fetchAll();

        $team_id = $result[0]["team_id"];

        $sql = "SELECT `team_id_a`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` =".$game_id;
        $result = $dbc->query($sql)->fetchAll();

        if ($team_id == $result[0]["team_id_a"])
        {
            $newscore_team_a = $result[0]["score_team_a"];
            $newscore_team_a += 1;
            $sql = "UPDATE `tbl_matches` SET `score_team_a`='".$newscore_team_a."' WHERE `id` =".$game_id;
            $dbc->query($sql);
        }
        else
        {
            $newscore_team_b = $result[0]["score_team_b"];
            $newscore_team_b += 1;
            $sql = "UPDATE `tbl_matches` SET `score_team_b`='".$newscore_team_b."' WHERE `id` =".$game_id;
            $dbc->query($sql);
        }



    }

    elseif ($_POST["request"] == 5)
    {
        $game_id = $_POST["id"];
        $player_id = $_POST["player"];
        $time = $_POST["time"];

        $team_id;

        $sql = "SELECT `team_id` FROM `tbl_players` WHERE `id`=".$player_id;
        $result = $dbc->query($sql)->fetchAll();

        $team_id = $result[0]["team_id"];

        $sql = "SELECT `team_id_a`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` = ".$game_id;
        $result = $dbc->query($sql)->fetchAll();

        if ($team_id == $result[0]["team_id_a"])
        {
            $newscore_team_a = $result[0]["score_team_a"];
            $newscore_team_a--;
            $sql = "UPDATE `tbl_matches` SET `score_team_a`=".$newscore_team_a." WHERE `id` =".$game_id;
            $dbc->query($sql);
        }
        else
        {
            $newscore_team_b = $result[0]["score_team_b"];
            $newscore_team_b--;
            $sql = "UPDATE `tbl_matches` SET `score_team_b`=".$newscore_team_b." WHERE `id` =".$game_id;
            $dbc->query($sql);
        }
    }

    elseif ($_POST["request"] == 6)
    {
        $game_id = $_POST["id"];

        $sql = "SELECT `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` =".$game_id;
        $result = $dbc->query($sql)->fetchAll();

        echo $result[0]["score_team_a"]." Vs ".$result[0]["score_team_b"];
    }

    elseif ($_POST["request"] == 7)
    {
        $game_id = $_POST["id"];

        $sql = "SELECT `exstra_time` FROM `tbl_matches` WHERE `id` =".$game_id;
        $result = $dbc->query($sql)->fetchAll();

        $return = $result[0]["exstra_time"];

        echo $return;
    }

    elseif ($_POST["request"] == 8)
    {
        $game_id = $_POST["id"];

        $sql = "SELECT `exstra_time` FROM `tbl_matches` WHERE `id` =".$game_id;
        $result = $dbc->query($sql)->fetchAll();

        $extra_time = $result[0]["exstra_time"] + 60;

        $sql = "UPDATE `tbl_matches` SET `exstra_time`='".$extra_time."' WHERE `id` =".$game_id;
        $dbc->query($sql);
    }

    elseif ($_POST["request"] == 9)
    {
    }
}