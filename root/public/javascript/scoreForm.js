var game_time;
var player_id;

$(document).ready(function () {

    var plusButtons = document.getElementsByClassName("plus");
    var minusButtons =  document.getElementsByClassName("minus");


    for (var i = 0; i < plusButtons.length; i++)
    {
        plusButtons[i].addEventListener("click", function() {
            player_id = $(this).parent().attr('player-id');
            game_time = getTime();

            console.log("dit is i: "+i+" dit is player id: "+ player_id);


            $.ajax("../app/ajax/ajaxManager.php", {
                method: "POST",
                data: {
                    "request" : 4,
                    "id" : game_id,
                    "player" : player_id,
                    "time": timer
                }
            }).done(function (data) {
                updateScore();
            });
        });

        minusButtons[i].addEventListener("click",function() {
            player_id = $(this).parent().attr('player-id');

            console.log("dit is i: "+i+" dit is player id: "+ player_id);

            $.ajax("../app/ajax/ajaxManager.php", {
                method: "POST",
                data: {
                    "request" : 5,
                    "id" : game_id,
                    "player" : player_id,
                    "time": timer
                }
            }).done(function (data) {
                updateScore();
            });
        });
    }
});

function updateScore() {
    $.ajax("../app/ajax/ajaxManager.php", {
        method: "POST",
        data: {
            "request" : 6,
            "id" : game_id
        }
    }).done(function (data) {
        console.log(data);
        document.getElementById("score").innerHTML = data;
    });
}