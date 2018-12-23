var timer = 0;

$(document).ready(function () {
    startTimer();

    $(".js-update-data").on("click", function () {
        updateTask();
    })

    $("input").on("change", function(){
        updateTask();
    });
})

function convertToSeconds(time) {
    //splits a minute in seconds
    var seconds = time * 60;
    return seconds;
}

function startTimer() {
    $(".js-start-timer").on("click", function () {
        startTimer = $(this).closest("tr").find(".js-task-actual");

        if ($(this).html() == "Start") {
            console.log("Start Timer");

            $(this).html("Stop");
            $(this).removeClass('btn-success').addClass('btn-danger');

            getTime = startTimer.val();
            startTimer.timer({
                seconds: convertToSeconds(getTime), format: '%m', duration: '10s', callback: function () {
                    checkDo();
                }, repeat: true
            })
        }
        else if ($(this).html() == "Stop") {

            $(this).html("Start");
            $(this).removeClass('btn-danger').addClass('btn-success');

            $(startTimer).timer('pause');

            console.log("Stop Timer");
        }
    })
}

function checkDo() {
    updateTask();

    doMinutes = 0;
    $( '.js-task-actual' ).each(function(index, value)
    {
        var DO = $(value).val();

        doMinutes +=  Number(DO);

    });
    $("#totalActualTime").html(doMinutes);
}

function updateTask() {

    $.ajax({
        type: "POST",
        url: "inc/update_task_table_db.php",
        data: $("#update-task-form").serialize(),

        success: function(data){
            console.log(data);
        }
    });
}