var interval = setInterval(function() {
    document.getElementById('timer_div').innerHTML = --seconds_left;
    if (seconds_left <= 0)
    {
        document.getElementById('timer_div').innerHTML = "Time's up";
        clearInterval(interval);
		submitgame();
    }
}, 1000);