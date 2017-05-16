<?php
Namespace App;

require_once(__DIR__ . "/../DatabaseConnector.php");

Class PoulGenerator {

    private $dbc;

    public function __construct()
    {
        $this->dbc = Connect();
    }

    public function fetchTeams()
    {
        $sql = "SELECT * FROM `tbl_teams`";
        $allTeams = $this->dbc->query($sql)->fetchAll();

        foreach ($allTeams as $team)
        {
            $sql = "SELECT `team_id` FROM `tbl_players` WHERE `team_id` =". $team["id"];
            $amountMembers = $this->dbc->query($sql)->rowCount();
            if ($amountMembers == 0)
            {
                $sql = "DELETE FROM `tbl_teams` WHERE `id` =". $team["id"];
                $this->dbc->query($sql);
            }
        }

        $sql = "SELECT * FROM `tbl_teams`";
        $allTeams = $this->dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        return $allTeams;
    }

    function shuffle_assoc($allTeams)
    {
        $keys = array_keys($allTeams);
        shuffle($keys);
        $random = array();
        $i = 0;
        foreach ($keys as $key)
        {
            $random[$i] = $allTeams[$key];
            $i++;
        }
        return $random;
    }

    public function PoulMaker()
    {
        for ($i = 1; $i < 5; $i++)
        {
            $sql = "INSERT INTO `tbl_poules` (`name`) VALUES ('$i')";
            $this->dbc->query($sql);
        }
    }

    public function PoulFiller($allTeams)
    {
        $amountTeams = Count($allTeams) / 4;
        $count = 0;
        for ($i = 1; $i < 5; $i++)
        {
            for ($j = 0; $j < $amountTeams; $j++)
            {
                if (isset($allTeams[$count]['name']))
                {
                    $tempTeam = $allTeams[$count]['name'];
                }
                if ($tempTeam != null)
                {
                    if ($amountTeams == $count)
                    {
                        break;
                    }
                    $count++;
                    $sql = "UPDATE `tbl_teams` SET `poule_id` = '$i' WHERE `name` = '$tempTeam'";
                    $this->dbc->query($sql);
                }
            }
        }
    }
}