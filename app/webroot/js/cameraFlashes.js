function runCameraFlashes(delay){

	return setInterval(function(){

		var randomFlashId = Math.floor(Math.random() * 24) + 1;
		var count = 0;
		var flashElement = document.getElementById("flash" + randomFlashId);

		if($(flashElement).length){

			flashElement.style.display = "none";
			
			var intervalId = setInterval(function(){

				if(count < 2){
					if(flashElement.style.display == "none"){
						flashElement.style.display = "block";
					} else{
						flashElement.style.display = "none";
					}
					count++;
				}else{
					flashElement.style.display = "none";
					clearInterval(intervalId);
				}
			},200);
		}
	},delay);


}
