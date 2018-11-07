var firstname = document.getElementById("Name");
var lastname = document.getElementById("Lastname");
var mail = document.getElementById("Mail");
var messagesContainer = document.getElementById("message-list");

function validateForm() {

	var errorMessages = [];

	//prevent showing default error message balloons
	document.querySelector( "form" ).addEventListener( "invalid", function( event ) {
 	       event.preventDefault();
    }, true);


	if(firstname.validity.valueMissing == true){
		errorMessages.push("oeps voornaam vergeten");
		firstname.style.border = "1px solid red";	
	}
	else{
		firstname.style.border = "1px solid black"
	}

	if(lastname.validity.valueMissing == true){
		errorMessages.push("oeps lastname vergeten");
		lastname.style.border = "1px solid red";	
	}
	else{
		lastname.style.border = "1px solid black"
	}
	
	if(mail.validity.valueMissing == true){
		errorMessages.push("oeps mail vergeten");
		mail.style.border = "1px solid red";	
	}
	else{
		mail.style.border = "1px solid black"
	}

	messageList = "";
/*
	for(var i=0; i < errorMessages.length; i++){
		messageList += "<li>" + errorMessages[i] + "</li>";
		messagesContainer.innerHTML = messageList;
	}*/

}