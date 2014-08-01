function ajaxGetSelections(){
	$.ajax({
		url: "/" + rootDir + "/gameBalls/fetchSelections/locationId:normal",
		cache: false,
		type: "GET",
		success: function (data) {
			$("#main_crosshairs").html(data);
			$.ajax({
				url: "/" + rootDir + "/gameBalls/fetchSelections/locationId:loupe",
				cache: false,
				type: "GET",
				success: function (data) {
					$("#loupe_crosshairs").html(data);
					moveUserSelections(date);
				}
			});
		}
	});
}