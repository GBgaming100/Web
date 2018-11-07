function getSpeedValue() {
    var speedValue = 0;
    $.ajax({
        type: "GET",
        url: "libs/getCurrentSpeed.php",

        success: function (data) {
            console.log(data);
            console.log(data[0]['speed']);
            speedValue = data[0]['speed'];

            $("#speed-value-container").html(speedValue);
            $("#speed-range-slider").val(speedValue);

            saveSpeedValueInDb(speedValue);
        },

        complete: function () {
            setTimeout(getSpeedValue, 5000);
        }
    });
}

//send request to database to save the latest speed value
function saveSpeedValueInDb(speedValue) {

	console.log("The current speed is: " + speedValue);
	
    var speedValue = 0;
    $.ajax({
        type: "GET",
        url: "libs/getCurrentSpeed.php",

        success: function (data) {
            console.log(data);
            console.log(data[0]['speed']);
            speedValue = data[0]['speed'];

            $("#speed-value-container").html(speedValue);
            $("#speed-range-slider").val(speedValue);

            saveSpeedValueInDb(speedValue);
        },

        complete: function () {
            setTimeout(getSpeedValue, 5000);
        }
    });
}



$(document).ready(function(){
    var speedValue = 0;

	$("#speed-range-slider").on("change", function(){

		speedValue = $(this).val();

		$("#speed-value-container").html(speedValue);

		saveSpeedValueInDb(speedValue);


	});

	
	getSpeedValue();


});













