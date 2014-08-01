var alertString = "";
var showAlert = false;

/****************************************************************
 *	Validate First Name											*
 ****************************************************************/
function validateFirstName(){

	var firstName = $("#UserFirstName").val();

	if (firstName == null || firstName == ""){
		$("#check_name").html("(first name and surname is required)");
		$("#check_name").addClass("helper--highlight-text");
		$("#UserNameLabel").addClass("helper--highlight-text");
		$("#UserFirstNameLabel").addClass("helper--highlight-text");
		$("#UserFirstName").addClass("highlight_input");
		
		alertString = alertString + "first name is required\n";
		showAlert = true;

	} else{
		$("#check_name").html("");
		$("#check_name").removeClass("helper--highlight-text");
		$("#UserFirstName").removeClass("highlight_input");
		$("#UserNameLabel").removeClass("helper--highlight-text");
		$("#UserFirstNameLabel").removeClass("helper--highlight-text");
	}
}

/****************************************************************
 *	Validate Surname											*
 ****************************************************************/
function validateSurname(){

	var surname = $("#UserSurname").val();

	if (surname == null || surname == ""){
		$("#check_name").html("(first name and surname is required)");
		$("#check_name").addClass("helper--highlight-text");
		$("#UserNameLabel").addClass("helper--highlight-text");
		$("#UserSurnameLabel").addClass("helper--highlight-text");
		$("#UserSurname").addClass("highlight_input");

		alertString = alertString + "surname is required\n";
		showAlert = true;
	}else{
		$("#check_name").html("");
		$("#check_name").removeClass("helper--highlight-text");
		$("#UserSurname").removeClass("highlight_input");
		$("#UserNameLabel").removeClass("helper--highlight-text");
		$("#UserSurnameLabel").removeClass("helper--highlight-text");
	}
}

/****************************************************************
 *	Validate Username											*
 ****************************************************************/
function validateUsername(){

	var username = $("#UserUsername").val();

	if (username == null || username == ""){
		$("#check_username").html("(username is required)");
		$("#check_username").addClass("helper--highlight-text");
		$("#UserUsernameLabel").addClass("helper--highlight-text");
		$("#UserUsername").addClass("highlight_input");

		alertString = alertString + "username is required\n";
		showAlert = true;
	}else{
		$("#check_username").html("");
		$("#check_username").removeClass("helper--highlight-text");
		$("#UserUsername").removeClass("highlight_input");
		$("#UserUsernameLabel").removeClass("helper--highlight-text");
	}
}

/****************************************************************
 *	Validate Password											*
 ****************************************************************/
function validatePassword(){

	var password = $("#UserPassword").val();
	var confirmPassword = $("#UserPasswordVerify").val();

	if (password != confirmPassword || password == "" || password == null){
		$("#check_passwords_match").html("(invalid password)");
		$("#check_passwords_match").addClass("helper--highlight-text");
		$("#UserPassword").addClass("highlight_input");
		$("#UserPasswordVerify").addClass("highlight_input");
		$("#UserPasswordLabel").addClass("helper--highlight-text");
		$("#UserPasswordOneLabel").addClass("helper--highlight-text");
		$("#UserPasswordTwoLabel").addClass("helper--highlight-text");

		alertString = alertString + "passwords do not match\n";
		showAlert = true;
	}else{

		$("#check_passwords_match").html("");
		$("#check_passwords_match").removeClass("helper--highlight-text");
		$("#UserPassword").removeClass("highlight_input");
		$("#UserPasswordVerify").removeClass("highlight_input");
		$("#UserPasswordLabel").removeClass("helper--highlight-text");
		$("#UserPasswordOneLabel").removeClass("helper--highlight-text");
		$("#UserPasswordTwoLabel").removeClass("helper--highlight-text");
	}
}



/****************************************************************
 *	Validate Email Address										*
 ****************************************************************/
function validateEmailAddress(){

	var emailAddress = $("#UserEmailAddress").val();
	var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (emailAddress == null || emailAddress == "" || !regEx.test(emailAddress)){

		$("#check_email_address").html("(email address is not valid)");
		$("#check_email_address").addClass("helper--highlight-text");
		$("#UserEmailAddress").addClass("highlight_input");
		$("#UserEmailAddressLabel").addClass("helper--highlight-text");

		alertString = alertString + "a valid email address is required\n";
		showAlert = true;
	}else{

		$("#check_email_address").html("");
		$("#check_email_address").removeClass("helper--highlight-text");
		$("#UserEmailAddress").removeClass("highlight_input");
		$("#UserEmailAddressLabel").removeClass("helper--highlight-text");
	}
}

/****************************************************************
 *	Validate Email Address										*
 ****************************************************************/
 function validatePhoneNumber(){

	var phoneNumber = $("#UserPhoneNumberOne").val();

	if (phoneNumber == null || phoneNumber == ""){
		$("#check_phone_number").html("(primary phone number is required)");
		$("#check_phone_number").addClass("helper--highlight-text");
		$("#UserPhoneNumberOne").addClass("highlight_input");
		$("#UserPhoneNumberLabel").addClass("helper--highlight-text");
		$("#UserPhoneNumberOneLabel").addClass("helper--highlight-text");
		$("#UserPhoneNumberTwoLabel").addClass("helper--highlight-text");

		alertString = alertString + "primary phone number is required\n";
		showAlert = true;
	}else{
		$("#check_phone_number").html("");
		$("#check_phone_number").removeClass("helper--highlight-text");
		$("#UserPhoneNumberOne").removeClass("highlight_input");
		$("#UserPhoneNumberLabel").removeClass("helper--highlight-text");
		$("#UserPhoneNumberOneLabel").removeClass("helper--highlight-text");
		$("#UserPhoneNumberTwoLabel").removeClass("helper--highlight-text");
	}
 }





/****************************************************************
 *	Validate Date Of Birth										*
 ****************************************************************/
 function validateDateOfBirth(){

	var dateOfBirth = $("#UserDateOfBirth").val();

	if (dateOfBirth == null || dateOfBirth == ""){
		$("#check_date_of_birth").html("(date of birth is required)");
		$("#check_date_of_birth").addClass("helper--highlight-text");
		$("#UserDateOfBirth").addClass("highlight_input");
		$("#UserDateOfBirthLabel").addClass("helper--highlight-text");
		$("#UserDateOfBirthFormatLabel").addClass("helper--highlight-text");

		alertString = alertString + "date of birth is required\n";
		showAlert = true;
	}else if(!isValidDate(dateOfBirth)){
		$("#check_date_of_birth").html("(invalid format, dd/mm/yyyy required)");
		$("#check_date_of_birth").addClass("helper--highlight-text");
		$("#UserDateOfBirth").addClass("highlight_input");
		$("#UserDateOfBirthLabel").addClass("helper--highlight-text");
		$("#UserDateOfBirthFormatLabel").addClass("helper--highlight-text");

		alertString = alertString + "date of birth is required in the format dd/mm/yyyy\n";
		showAlert = true;

	}else{
		$("#check_date_of_birth").html("");
		$("#check_date_of_birth").removeClass("helper--highlight-text");
		$("#UserDateOfBirth").removeClass("highlight_input");	
		$("#UserDateOfBirthLabel").removeClass("helper--highlight-text");
		$("#UserDateOfBirthFormatLabel").removeClass("helper--highlight-text");	
	}
}




/****************************************************************
 *	Validate Region												*
 ****************************************************************/
function validateRegion(){

	var region = $("#UserRegion").val();

	if (region == null || region == ""){
		$("#check_region").html("(region is required)");
		$("#check_region").addClass("helper--highlight-text");
		$("#UserRegionLabel").addClass("helper--highlight-text");
		$("#UserRegion").addClass("highlight_input");

		alertString = alertString + "region is required\n";
		showAlert = true;
	}else{
		$("#check_region").html("");
		$("#check_region").removeClass("helper--highlight-text");
		$("#UserRegion").removeClass("highlight_input");
		$("#UserRegionLabel").removeClass("helper--highlight-text");
	}
}

/****************************************************************
 *	Validate Form												*
 ****************************************************************/
function validateForm(){

	alertString = "";
	showAlert = false;

	validateFirstName();
	validateSurname();
	validateUsername();
	validatePassword();
	validateEmailAddress();
	validatePhoneNumber();
	//validateDateOfBirth();
	validateRegion();

	if(showAlert){
		alert(alertString);
		return false;
	}
}





function isValidDate(dateString){
	// First check for the pattern
	if(!/^\d{2}\/\d{2}\/\d{4}$/.test(dateString)){
		return false;
	}

	// Parse the date parts to integers
	var parts = dateString.split("/");
	var day = parseInt(parts[0], 10);
	var month = parseInt(parts[1], 10);
	var year = parseInt(parts[2], 10);

	// Check the ranges of month and year
	if(year < 1000 || year > 3000 || month == 0 || month > 12){
		return false;
	}

	var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

	// Adjust for leap years
	if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)){
		monthLength[1] = 29;
	}	
	// Check the range of the day
	return day > 0 && day <= monthLength[month - 1];
};
