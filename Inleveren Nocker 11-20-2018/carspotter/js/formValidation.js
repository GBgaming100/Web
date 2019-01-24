var addableReview = 0;

$(document).ready(function () {

    $(".submit_btn").on("click", function () {
        validate();
        sendReview();
    })
    $("input").on("change", function () {
        validate();
    });
    $("textarea").on("change", function () {
        validate();
    });
});

function validate() {
    var m_titleValid = 0;
    var m_commentValid = 0;
    var m_ratingValid = 0;

    //checks if title is valid
    if ($("#input_title").val() != "") {
        $(".feedback_title_valid").removeClass('hidden');
        $(".feedback_title_invalid").addClass('hidden');
        m_titleValid = 1;

    } else {
        $(".feedback_title_invalid").removeClass('hidden');
        $(".feedback_title_valid").addClass('hidden');
        m_titleValid = 0;

    }
    //checks if comment is valid
    if ($("#comment").val() != "") {
        $(".feedback_comment_valid").removeClass('hidden');
        $(".feedback_comment_invalid").addClass('hidden');
        m_commentValid = 1;
    } else {
        $(".feedback_comment_invalid").removeClass('hidden');
        $(".feedback_comment_valid").addClass('hidden');
        m_commentValid = 0;
    }

    //checks if rating is given
    if ($("#rating1").prop('checked') == true || $("#rating2").prop('checked') == true || $("#rating3").prop('checked') == true || $("#rating4").prop('checked') == true || $("#rating5").prop('checked') == true || $("#rating6").prop('checked') == true || $("#rating7").prop('checked') == true || $("#rating8").prop('checked') == true || $("#rating9").prop('checked') == true || $("#rating10").prop('checked') == true) {
        $(".feedback_rating_valid").removeClass('hidden');
        $(".feedback_rating_invalid").addClass('hidden');
        m_ratingValid = 1
    } else {
        $(".feedback_rating_invalid").removeClass('hidden');
        $(".feedback_rating_valid").addClass('hidden');
        m_ratingValid = 0;
    }

    if (m_titleValid == 1 && m_commentValid == 1 && m_ratingValid == 1) {
        console.log("send review");
        addableReview = 1;

    } else {
        console.log("not everything if filled in");
        addableReview = 0;
    }
}

function sendReview() {
    if (addableReview == 1) {
        $.ajax({
            type: "POST",
            url: "inc/addReview.php",
            data: $("#validation-form").serialize(),

            success: function (data) {
                console.log(data);
            }
        });
        location.reload(true);
    }
}