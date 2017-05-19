<?php
include_once ("tamplates/header.php");
include_once ("tamplates/ongoing-games.php");

$result = ongoing_games();
if ($result != 0)
{

}
else
{
    echo "   <div class=\"wrapper wrapper_page\">
                 <h4 class=\"column-center\">Sorry, No games at the moment</h4>
             </div>";
}