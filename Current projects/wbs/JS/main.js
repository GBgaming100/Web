function updateShows() {

    $.ajax({
        type: "POST",
        url: "inc/update_task_table_db.php",
        data: $("#update-shows-form").serialize(),

        success: function(data){
            console.log(data);
        }
    });
}

$(document).ready(function(){

    $(" .slider").on("change" ,function () {
        $(".output").html($(this).val());
    });

    $("#js-update-shows").on("click", function(){

        updateShows();
    });

    $(".js-start-timer").click(function(){

        startTimer = $(this).closest("tr").find(".js-task-do");
        TotalTime = $(this).closest("tr").find(".js-task-do");

        $.ajax({
            type: "POST",
            url: "inc/update_time.php",
            data: $(".time").serialize(),

            success: function(data){
                console.log(data);
            }
        });
        elapsedTime = startTimer.val();

        startTimer.timer({
            format: '%H:%M:%S',
            seconds: elapsedTime,

        });
    });

});

function deleteItem(){
    return confirm('Are you sure you want to delete this?');
}


