/*

function ajaxGameSidebar(direction){


	 var newMonth = increaseMonth(currentMonth, direction);

	currentMonth = newMonth;

	$.ajax({
		url: "/" + rootDir + "/celebrities/profile/month:"+newMonth,
		cache: false,
		type: "GET",
		success: function (data) {
			$("#profile_container").html(data);
		}
	});

}



function increaseMonth(month, direction){
	currentMonth = currentMonth.toString();

	var myDate = new Date();

	myDate.setFullYear(currentMonth.substring(0,4));
	myDate.setMonth(currentMonth.substring(4,6) - 1);

	console.log("first date: " + myDate);
	if(direction == "up"){
		myDate.setMonth(myDate.getMonth()+1);
	}else{
		myDate.setMonth(myDate.getMonth()-1);
	}

	console.log(myDate);

	var newMonth = myDate.getMonth() + 1;
	var newYear = myDate.getFullYear();

	console.log(newMonth);

	if(newMonth < 10){
		newMonth = "" + 0 + newMonth;
	}
	return formattedDate = "" + newYear + newMonth;
}


window.onload = function() {

	var switch_padding =  ( $( window ).width() - $("#main_grid").width() ) / 2;

	console.log(switch_padding);

	$(".switch_container").css("width",switch_padding);

	var currentElement = $("#switch_profile_right_container");
	var totalOffsetY = 0;

	do {
		totalOffsetY += currentElement.offsetTop;
	} while (currentElement = currentElement.offsetParent)

	var mouseY = Math.round((event.pageX - totalOffsetY),0);

	$("#switch_profile_right_container").mousemove(function(event) {
		$("#switch_arrow_right").css("top",mouseY);
	});
}


window.onresize = function() {

	var switch_padding =  ( $( window ).width() - $("#main_grid").width() ) / 2;

	console.log(switch_padding);

	$(".switch_container").css("width",switch_padding);
}
*/