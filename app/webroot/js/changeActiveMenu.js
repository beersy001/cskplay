function changeActiveMenu(id){
	switch(id){
		case "games":
			$("#play_menu_item").addClass("active-menu");
			break;
		default:
			$("#" + id + "_menu_item").addClass("active-menu");
	}
}