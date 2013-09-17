$(document).ready(function() {

	var end = new Date('10/01/2013 12:00 AM');

	var _second = 1000;
	var _minute = _second * 60;
	var _hour = _minute * 60;
	var _day = _hour * 24;
	var timer;

	timer = setInterval(showRemaining, 1000);





	function showRemaining() {
		var now = new Date();
		var distance = end - now;

		if (distance < 0) {

			clearInterval(timer);
			document.getElementById('countdown').innerHTML = 'EXPIRED!';

			return;
		}
		var days = Math.floor(distance / _day).toString();
		var hours = Math.floor((distance % _day) / _hour).toString();
		var minutes = Math.floor((distance % _hour) / _minute).toString();
		var seconds = Math.floor((distance % _minute) / _second).toString();

		if(days.length == 1){
			days = '0' + days;
		}

		if(hours.length == 1){
			hours = '0' + hours;
		}

		if(minutes.length == 1){
			minutes = '0' + minutes;
		}

		if(seconds.length == 1){
			seconds = '0' + seconds;
		}

		document.getElementById('days_first').innerHTML = '<p>' + days.substring(0,1) + '</p>';
		document.getElementById('days_second').innerHTML = '<p>' + days.substring(1,2) + '</p>';
		document.getElementById('hours_first').innerHTML = '<p>' + hours.substring(0,1) + '</p>';
		document.getElementById('hours_second').innerHTML = '<p>' + hours.substring(1,2) + '</p>';
		document.getElementById('minutes_first').innerHTML = '<p>' + minutes.substring(0,1) + '</p>';
		document.getElementById('minutes_second').innerHTML = '<p>' + minutes.substring(1,2) + '</p>';
		document.getElementById('seconds_first').innerHTML = '<p>' + seconds.substring(0,1) + '</p>';
		document.getElementById('seconds_second').innerHTML = '<p>' + seconds.substring(1,2) + '</p>';
	}

});