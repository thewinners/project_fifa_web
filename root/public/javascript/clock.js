var time;
var myTimer;
var timer2 = 0;
var timer = timer2;
var game_id = $(".page-title h2").attr("match-id");
var match_time = 1200;
var extra_time1 = 0;
var extra_time = extra_time1;

$(document).ready(function () {

    var start = document.getElementById("start");
    var pause = document.getElementById("pauze");
    var play = document.getElementById("play");
    var add = document.getElementById("plusTime");
    var done = document.getElementById("finish");

    start.addEventListener("click",function () {
        showTimer();
        getStartTime();
        myTimer = setInterval(theTimer, 1000);
        getExtraTime();
    });

    pause.addEventListener("click", function () {
        savePauseTime();
        clearInterval(myTimer);
        document.getElementById("play").classList.remove("hidden");
        document.getElementById("pauze").classList.add("hidden");
    });

    play.addEventListener("click", function () {
        getTimeAndStart();
    });
    add.addEventListener("click", function () {
        addExtraTime();
    });
    done.addEventListener("click", function () {
        endGame();
    })
});

function savePauseTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 2,
            "id" : game_id
        }
    });
}

function getStartTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 1,
            "id" : game_id
        }
    }).done(function (data) {
        timer = data;
    });
}

function getTimeAndStart() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 3,
            "id" : game_id
        }
    }).done(function (data) {
        timer2 = data;
        startTimer();
    });
}

function getTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 3,
            "id" : game_id
        }
    }).done(function (data) {
        timer2 = data;
    });
}

function startTimer() {
    myTimer = setInterval(theTimer, 1000);
    document.getElementById("pauze").classList.remove("hidden");
    document.getElementById("play").classList.add("hidden");
}

function showTimer() {
    document.getElementById("clock").classList.remove("hidden");
    document.getElementById("start").classList.add("hidden");
}

function getExtraTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 7,
            "id" : game_id
        }
    }).done(function (data) {
        extra_time = data;
        console.log(extra_time);
        updateExtraTime();
    });
}

function addExtraTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 8,
            "id" : game_id
        }
    }).done(function () {
        getExtraTime();
    });
}

function updateExtraTime() {
    calulateTime = extra_time;
    var hour = Math.floor(calulateTime / 3600);
    calulateTime = calulateTime % 3600;
    var min = Math.floor(calulateTime / 60);
    calulateTime = calulateTime % 60;
    if (hour != 0) {
        time = hour + ":" + min + ":" + calulateTime;
    }
    else if (min != 0) {
        time = min + ":" + calulateTime;
    }
    else {
        time = calulateTime;
    }

    document.getElementById("extraTime").innerHTML = "extra time = " + time;

    if (match_time <= timer)
    {
        var temp = match_time + extra_time;
        if (temp == timer)
        {
            clearInterval(myTimer);
            document.getElementById("time").innerHTML = "Done";
        }
    }
}

function theTimer() {
    timer++;
    calulateTime = timer;
    var hour = Math.floor(calulateTime / 3600);
    calulateTime = calulateTime % 3600;
    var min = Math.floor(calulateTime / 60);
    calulateTime = calulateTime % 60;
    if (hour != 0) {
        time = hour + ":" + min + ":" + calulateTime;
    }
    else if (min != 0) {
        time = min + ":" + calulateTime;
    }
    else {
        time = calulateTime;
    }

    document.getElementById("time").innerHTML = time;
}

function endGame() {

}