function getCurrentBlockStatus() {

    $.ajax({
        type: "GET",
        url: "libs/getCurrentBlocks.php",

        success: function (data) {


            $.each(data, function (index, value) {
                if (value['status'] == 1) {
                    $("#" + value['io']).css('background-color', 'green');
                    $("#" + value['io']).attr('data-block-status', 1);
                } else {
                    $("#" + value['io']).css('background-color', 'red');
                    $("#" + value['io']).attr('data-block-status', 0);
                }
            })

        },

        complete: function () {
            setTimeout(getCurrentBlockStatus, 5000);
        }
    });

}



function turnBlockOnAndOff(blockId, blockStatus) {

    if (blockStatus == "On"){ blockStatus = 1;}
    else{blockStatus = 0;}

    ///////////////////////
    //1. AJAX call to database
    ///////////////////////
    $.ajax({
        url: "libs/addBlocksToDB.php",
        type: "POST",
        data: {blockId: blockId, blockStatus: blockStatus},

        success: function (data) {
            console.log(data);
            ///////////////////////
            //2. AJAX call to arduino
            ///////////////////////
            $.ajax({
                url: "http://192.168.0.40", //IP of Arduino
                type: "POST",
                data: {blockId: blockId, blockStatus: blockStatus},
                dataType: 'jsonp',
                contentType: 'application/json',
                crossDomain: true,

                success: function (data) {

                }
            });

        }
    });
}

$(document).ready(function () {

    //On click events are used to execute "turnBlockOnAndOff" function
    $(".btn-block-on").on("click", function () {

        //get block id
        var blockId = $(this).parent().attr("data-block");
        //get status (on and off)
        var blockvalue = $(this).val();
        //send data to turnBlockOnAndOff()
        turnBlockOnAndOff(blockId, blockvalue);
    });

    $(".btn-block-off").on("click", function () {

        //get block id
        var blockId = $(this).parent().attr("data-block");
        //get status (on and off)
        var blockvalue = $(this).val();
        //send data to turnBlockOnAndOff()
        turnBlockOnAndOff(blockId,blockvalue);
    });

    getCurrentBlockStatus();

});