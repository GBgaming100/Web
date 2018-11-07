$(document).ready(function(){

    $(" .slider").on("change" ,function () {
        $(".output").html($(this).val());
    });
});x