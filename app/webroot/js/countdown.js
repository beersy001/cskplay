$(document).ready(function() {
	
	var timer = setInterval(showRemaining, 1000);
});

function showRemaining() {
	var now = new Date();

	var m = now.getMonth();
	//getMonth() returns 0-11 so we need to add 1 to bring it up to the current month
	m++;


	if (m == 12) {
		m = 1;
	}else{
		m++;
	}

	var end = new Date(m + '/01/2013 12:00 AM');
	var distance = end - now;
	var _second = 1000;
	var _minute = _second * 60;
	var _hour = _minute * 60;
	var _day = _hour * 24;
	var timer;

	var days = Math.floor(distance / _day).toString();
	var hours = Math.floor((distance % _day) / _hour).toString();
	var minutes = Math.floor((distance % _hour) / _minute).toString();
	var seconds = Math.floor((distance % _minute) / _second).toString();

	days = (days.length == 1) ? '0' + days : days;
	hours = (hours.length == 1) ? '0' + hours : hours;
	minutes = (minutes.length == 1) ? '0' + minutes : minutes;
	seconds = (seconds.length == 1) ? '0' + seconds : seconds;

	document.getElementById('days_first').innerHTML = '<p>' + days.substring(0,1) + '</p>';
	document.getElementById('days_second').innerHTML = '<p>' + days.substring(1,2) + '</p>';
	document.getElementById('hours_first').innerHTML = '<p>' + hours.substring(0,1) + '</p>';
	document.getElementById('hours_second').innerHTML = '<p>' + hours.substring(1,2) + '</p>';
	document.getElementById('minutes_first').innerHTML = '<p>' + minutes.substring(0,1) + '</p>';
	document.getElementById('minutes_second').innerHTML = '<p>' + minutes.substring(1,2) + '</p>';
	document.getElementById('seconds_first').innerHTML = '<p>' + seconds.substring(0,1) + '</p>';
	document.getElementById('seconds_second').innerHTML = '<p>' + seconds.substring(1,2) + '</p>';
}