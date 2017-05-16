<?php
namespace App;

function showClock()
{
    ?>
    <script>
        window.onload = function() {
            document.getElementById("clock").classList.remove("hidden");
            document.getElementById("start").classList.add("hidden");
        };
    </script>
    <?php
}

function startClock()
{

    include_once (__DIR__."/../../config/config.php");

    $timer = 0;
    $eindTime = $matchTime;
    $startTime = time();
    ?>
        var myVar = setInterval(theTimer, 1000);
        var timer = <?php echo $timer;?>;
        var eindTime = <?php echo $eindTime;?>;

    </script>
    <?php
    return $startTime;
}

function updateClock()
{

}
?>