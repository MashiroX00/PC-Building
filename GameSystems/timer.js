let timeleft = 120;

function countdown() {
    if (timeleft == 0) {
        document.getElementById("timer").innerHTML = "หมดเวลา!";
    }else {
        document.getElementById("timer").innerHTML = timeleft+" วินาที";
        timeleft--;
        setTimeout(countdown,1000);
    }
}