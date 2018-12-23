// var socket = io.connect('http://localhost:8080');

// socket.on(getCurrentBlockStatus());
var interval = 500;

var nonstopPost = false;

function playSound() {
  var sound = document.getElementById("audio");
  sound.play();
}


function mustache(data, template, outerTemplate)
{
	
	if ($(outerTemplate).data('template')) 
		{
			var template = $(outerTemplate).data('template');
		}
	else
		{
			var template = $(template).html();
			$(outerTemplate).data('template', template);
		}

	var renderTemplate = Mustache.render(template, data);

	$(outerTemplate).html(renderTemplate);
}

function getCurrentBlockStatus() {

	$.ajax({
		type: "GET",
		url: "libs/getCurrentBlocks.php",
		
		success: function(data){
			
		$.each(data, function(index, value){

			                

			if( value["status"] == 0)
			{
				value["status-string"] = "On";         
			}
			else
			{
				value["status-string"] = "Off";
			}

		});
		// console.table(data);

		mustache(data, "#block-template", "#block-template-div");
		$.each(data, function(index, value){

			                

			if( value["status"] == 0)
			{

				$("body").find("#" + value['io']).prop("checked", true);           
			}
			else
			{

				$("body").find("#" + value['io']).prop("checked", false);

			}

		});
		if (nonstopPost == true) {
			$.each(data, function(index, value){

				$.ajax({
		                url: "http://192.168.0.40/", //IP of Arduino
		                type: "POST",
		                data: {$blockId: value['id'], blockStatus: value['status']+"@"},
		                dataType: 'jsonp',
		                contentType: 'application/json',
		                crossDomain: true,

		            });
				});
		}

  		makeCardsEven("#station-img", "#blockssystem");

		},

			complete: function(){
	            setTimeout(getCurrentBlockStatus, interval);
	        }
	    });

}


function turnBlockOnAndOff(blockId, blockStatus){

	if (blockStatus == true) { blockStatus = 0;}
	else { blockStatus = 1; }

	// console.log(blockStatus);
	// console.log(blockId);

	///////////////////////
    //1. AJAX call to database
    ///////////////////////
    $.ajax({
        url: "libs/addBlocksToDB.php",
        type: "POST",
        data: {blockId: blockId, blockStatus: blockStatus},

        success: function (data) {
            // console.log(data);
            ///////////////////////
            //2. AJAX call to arduino
            ///////////////////////
            $.ajax({
                url: "http://192.168.0.40/", //IP of Arduino
                type: "POST",
                data: {$blockId: blockId, blockStatus: blockStatus+"@"},
                dataType: 'jsonp',
                contentType: 'application/json',
                crossDomain: true,

            });

        }
    });
}

function getSpeedValue() {

	$.ajax({
		type: "GET",
		url: "libs/getSpeed.php",
		
		success: function(data){
			
		// console.table(data);

		mustache(data, "#train-template", "#train-template-div");

		changedirectiontext(data[0]['direction']); 

		if (nonstopPost == true) 
		{
			$.ajax({
				url: "http://192.168.0.40", //IP of Arduino
				type: "POST",
				data: {$speedValue: data[0]['speed'] + "!", speedDir: data[0]['direction'] + "@"}, 
		        dataType: 'jsonp',
		        contentType : 'application/json',
			    crossDomain: true,
				
			});
		}

  		makeCardsEven("#freight-img", "#trainspeed");

		},

		complete: function(){
            setTimeout(getSpeedValue, interval);
        }
	});

}

//send request to database to save the latest speed value
function saveSpeedValueInDb(speedValue, direction, trainId) {

	// console.log("The current speed is: " + speedValue);
	// console.log("The current direction is: " + direction);

	///////////////////////
	//1. AJAX call to database
	///////////////////////
	$.ajax({
		url: "libs/updateSpeed.php", 
		type: "POST",
		data: {trainId: trainId, speedValue: speedValue, direction: direction},
		
		success: function(data){

			///////////////////////
			//2. AJAX call to arduino
			///////////////////////
			$.ajax({
				url: "http://192.168.0.40", //IP of Arduino
				type: "POST",
				data: {$speedValue: speedValue + "!", speedDir: direction + "@"}, 
		        dataType: 'jsonp',
		        contentType : 'application/json',
			    crossDomain: true,
			});

		}
	});

}

function changedirectiontext(direction) 
	{
		var text = "";
		var addClass = "";
		var removeClass = "";

		if (direction == 1) 
		{
			text = "counter clockwise";
			addClass = "fa-undo";
			removeClass = "fa-redo";
		}
		else
		{
			text = "clockwise";
			addClass = "fa-redo";
			removeClass = "fa-undo";
		}

		$(".direction-text").text(text);
		$(".direction-icon").removeClass(removeClass);
		$(".direction-icon").addClass(addClass);
	}

function makeCardsEven(MainCard, CurrentCard)
{
	// console.log(CurrentCard + "height = " + $(CurrentCard).height() + "px");
	// console.log(MainCard + "height = " + $(MainCard).height() + "px");

	var height = 295;

	height = $(CurrentCard).height();

	$(MainCard).height(height);
}

function getTrackchanger()
{
	$.ajax({
        url: "http://192.168.0.40/", //IP of Arduino
        type: "GET",
        dataType: 'json',
        crossDomain: true,

        success: function(data){

        	data = data["wissels"];

        	$.each(data, function(index, value){
				value["id"] = (index + 1);

				var trackStatus;

				if (value["wissel"] == 1) 
				{
					trackStatus = true;
				}
				else
				{
					trackStatus = false;
				}

				turntrackOnAndOff(value["id"], trackStatus, false);

			});

			// console.table(data);

		}

    });

	$.ajax({
		type: "GET",
		url: "libs/getCurrentTrackchanger.php",
		
		success: function(data){
			
		$.each(data, function(index, value){

			                

			if( value["status"] == 0)
			{
				value["status-string"] = "On";         
			}
			else
			{
				value["status-string"] = "Off";
			}

		});
		// console.table(data);

		mustache(data, "#alternate-template", "#alternate-template-div");

		$.each(data, function(index, value){

			                

			if( value["status"] == 0)
			{

				$("body").find("#" + value['io']).prop("checked", true);           
			}
			else
			{

				$("body").find("#" + value['io']).prop("checked", false);

			}

		});
		if (nonstopPost == true) {
			$.each(data, function(index, value){

				$.ajax({
		                url: "http://192.168.0.40/", //IP of Arduino
		                type: "POST",
		                data: {$changerId: value['id'], changerStatus: value['status']+"@"},
		                dataType: 'jsonp',
		                contentType: 'application/json',
		                crossDomain: true,

		            });
				});
		}

  		makeCardsEven("#alternate-img", "#trackchange");
		
		},

		complete: function(){
            setTimeout(getTrackchanger, interval);
        }
	});
}
function turntrackOnAndOff(trackId, trackStatus, updateArduino){

	if (trackStatus == true) { trackStatus = 0;}
	else { trackStatus = 1; }

	// console.log("trackId = " + trackId);
	// console.log("trackStatus = " + trackStatus);
	// console.log("-------------------");

	///////////////////////
    //1. AJAX call to database
    ///////////////////////
    
	    $.ajax({
	        url: "libs/addTracksToDB.php",
	        type: "POST",
	        data: {trackId: trackId, trackStatus: trackStatus},

	        success: function (data) {
	            ///////////////////////
	            //2. AJAX call to arduino
	            ///////////////////////

	            if (updateArduino == true) 
    			{
		            $.ajax({
		                url: "http://192.168.0.40/", //IP of Arduino
		                type: "POST",
		                data: {$trackId: trackId, trackStatus: trackStatus+"@"},
		                dataType: 'jsonp',
		                contentType: 'application/json',
		                crossDomain: true

		            });
		        }

	        }
	    });
}

function getTrafficLights()
{
	$.ajax({
        url: "http://192.168.0.40/", //IP of Arduino
        type: "GET",
        dataType: 'json',
        crossDomain: true,

        success: function(data){

        	data = data["sensors"];

        	$.each(data, function(index, value){
				value["io"] = (index + 1);

			});

			// console.table(data);

			mustache(data, "#traffic-template", "#traffic-template-div");

			$.each(data, function(index, value){
				if( value['sensor'] == 1)
				{

					$("body").find(".red" + value["io"]).prop("checked", true);           
				}
				else
				{

					$("body").find(".green" + value["io"]).prop("checked", true);
				}
			});

        },
        complete: function(){
            setTimeout(getTrafficLights, interval);
        }

    });
}

$(document).ready(function(){
	// BLOCKS
	//On click events are used to execute "turnBlockOnAndOff" function
	$("body").on("click", ".blockcheckbox", function(){               

		//get block id
		var blockId = $(this).attr("data-block");

		//get status (on and off)	
		var blockValue = $(this).prop("checked");
		
		//send data to turnBlockOnAndOff()
		turnBlockOnAndOff(blockId, blockValue);

		// console.log(blockValue);

		

	});
	// -------------------------------------------------------

	// TRAIN

	var direction;
	var speedValue;

	$("body").on("click", ".btn-swapdirection",function(){

		direction = $(this).val();

		var trainId = this.getAttribute("data-train-type");

		// console.log(trainId);

		if (direction == 1) 
		{
			direction = 0;
		}
		else  
		{
			direction = 1;
		}

		changedirectiontext(direction);

		speedValue = 0;

		saveSpeedValueInDb(speedValue, direction, trainId);

	});

	$("body").on("change", ".speed-range-slider",function(){               
		
		speedValue = $(this).val();

		if (speedValue == $(this).attr("min"))
		{
			speedValue = 0;
		}

		var trainId = this.getAttribute("data-train-type");

		// console.log(trainId);

		$(".speed-value-container*[data-train-type='" + trainId + "']").html(speedValue);

		saveSpeedValueInDb(speedValue, direction, trainId);


	});

	$("body").on("click", ".trackcheckbox", function(){               

		//get block id
		var trackId = $(this).attr("data-block");

		//get status (on and off)	
		var trackValue = $(this).prop("checked");
		
		//send data to turnBlockOnAndOff()
		turntrackOnAndOff(trackId, trackValue, true);

		// console.log(trackValue);

		

	});

	getSpeedValue();

	getCurrentBlockStatus();

	getTrackchanger();

	getTrafficLights();

	sal();

	$('.backToTop').on('click', function(e){
	    $("html, body").animate({scrollTop: $("nav").offset().top}, 500);
	});


});

$( window ).resize(function() {
  makeCardsEven("#freight-img", "#trainspeed");
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})