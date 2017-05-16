<?php
namespace App;

require_once (__DIR__."/../DatabaseConnector.php");
include_once (__DIR__."/../../config/config.php");

function GenerateMatches()
{

    $sql = "SELECT * FROM `tbl_poules`";
    $amountPools = Connect()->query($sql)->rowCount();

    for ($i = 1; $i <= $amountPools; $i++)
    {
        $sql = "SELECT * FROM `tbl_teams` WHERE `poule_id` = ".$i;
        $teams = Connect()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        for ($a = 0; $a < Count($teams); $a++)
        {
            for ($b = 0; $b < Count($teams); $b++)
            {
                if ($a != $b)
                {
                    $sql = "SELECT * FROM `tbl_matches` WHERE `team_id_a` = ".$teams[$a]['id']." AND `team_id_b` = ".$teams[$b]["id"];
                    $total = Connect()->query($sql)->rowCount();
                    $sql = "SELECT * FROM `tbl_matches` WHERE `team_id_a` = ".$teams[$b]["id"]." AND `team_id_b` = ".$teams[$a]["id"];
                    $total += Connect()->query($sql)->rowCount();
                    if ($total == 0)
                    {
                        $sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`) VALUES ('".$teams[$a]['id']."', '".$teams[$b]['id']."')";
                        Connect()->query($sql);
                    }
                }
            }
        }
    }
}