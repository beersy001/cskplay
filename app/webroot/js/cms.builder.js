function addRow(){
	var $container = $(".js-cms-wrapper");
	var newRow = "" +
		"<div class='[ onerow ]  [ content__mock-row ]' data-column-count='0'>" +
			"<div class='[ mock-row__controls ]'>" +
				"<span class='[ onerow__row-title ]'>single row</span>" +
				"<span> | <span>" +
				"<span class='[ helper--mock-link ]  [ js-remove-row ]'>remove</span>" +
				"<span> | <span>" +
				"<span>add column</span>" +
				"<span> - <span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='1'> 1 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='2'> 2 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='3'> 3 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='4'> 4 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='5'> 5 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='6'> 6 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='7'> 7 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='8'> 8 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='9'> 9 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='10'> 10 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='11'> 11 </span>" +
				"<span class='[ helper--mock-link ]  [ js-add-column ]' data-column-span='12'> 12 </span>" +
			"</div>" +
		"</div>";
	$container.append(newRow);
}

function removeRow(event){
	var $element = $(event.target);
	$element.closest(".content__mock-row").remove();
}

function addColumn(event){
	var $element = $(event.target);
	var columnSpan = $element.attr("data-column-span");
	var $container = $element.closest(".content__mock-row");
	var columnCount = $container.attr("data-column-count");
	var updatedColCount = parseInt(columnCount) + parseInt(columnSpan);
	var lastFlag = "";

	if(updatedColCount == 12){
		lastFlag = " last";
	}else if(updatedColCount > 12){
		return;
	}

	$container.attr("data-column-count", updatedColCount)
	var newColumn = "" +
		"<div class='[ mock-row__mock-column ]  [ col" + columnSpan + lastFlag + " ]' data-column-span='" + columnSpan + "'>" +
			"<div class='[ mock-row__controls ]'>" +
				"<i class='[ fa  fa-times ]  [ controls__remove-icon ]  [ js-remove-column ]'></i>" +
			"</div>" +
		"</div>";

	$container.append(newColumn);
}

function removeColumn(event){
	var $element = $(event.target);

	var $parentRow = $element.closest(".content__mock-row");
	var totalColumnCount = parseInt($parentRow.attr("data-column-count"));

	var $thisColumn = $element.closest(".mock-row__mock-column");
	var thisColmnSpan = parseInt($thisColumn.attr("data-column-span"));

	$parentRow.attr("data-column-count", totalColumnCount - thisColmnSpan);
	$thisColumn.siblings(".last").removeClass("last");
	$thisColumn.remove();
}

function addParagraph(){
	
}

function addHeadingOne(){
	
}

function addHeadingTwo(){
	
}

function addVideoBackground(){
	
}

function addImage(){
	
}