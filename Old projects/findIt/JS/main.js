var images = [
    "autobots-logo.gif",
    "batman-logo.gif",
    "dare-devil-logo.gif",
    "decepticon-logo.gif",
    "great-american-hero-logo.gif",
    "spawn-logo.gif",
    "spiderman-logo.gif",
    "storm-superhero-logo.gif",
    "super-man-logo.gif",
];


function startTimer() {
    $('.time').timer({
        format: '%H:%M:%S'
    });
}

function stopTimer() {
    $('.time').timer('pause');
}

function resetTimer() {
    $('.time').timer('remove');
}


previewCounter = 0;

function changePreview() {
    if (previewCounter == (tmp_images.length - 1)) {
        stopTimer();
        var result = $(".time").data('seconds');
        var confirmResult = confirm(`Game ended after: ${result} seconds, you clicked ${clickAmount} times.\n Play again?`);
        console.log(confirmResult);
        if (confirmResult == true) {
            setTimeout(function(){location.reload();},1000);
        }
    }
    else {
        previewCounter++;
        $(".preview").attr("id", previewCounter);
        $(".preview").attr("src", "images/" + tmp_images[previewCounter]);
        console.log(previewCounter);
        console.log(tmp_images.length);
    }
}

var tmp_images = [];

function setupBoard() {
    var itemCount = 0;

    $.each(images, function (tmpItem, tmpValue) {
        tmp_images.push(images[tmpItem]);

    });

    images.sort(function () {
        return 0.5 - Math.random()
    });

    $.each(images, function (item, value) {
        itemCount++;
        $(".game-board").append(`<div class='board col-2' id='${itemCount}'><img class='col-12' src='images/${value}'></div>`);
    });

    $(".content-body").css("opacity", "0.8");
}


// function resetVar(){

// count = 0;
//    pairCount = 9,


// }
$(document).ready(function () {


    setupBoard();


    $(".timerStart ").click(function () {
        startTimer();
        console.log("start");
        $(".content-body").addClass("Enabled");
        $(".content-body").css("opacity", "1");

    });

    $(".Reset").click(function () {
        var confirmReset = confirm("are you sure you want to reset")
        console.log(confirmReset);
        if (confirmReset == true) {
            setTimeout(function () {
                location.reload();
            }, 1000);
        }

    })
    cardIdPreview = null;
    cardIdOne = null;
    cardattrPreview = null;
    cardAttrOne = null;
    clickAmount = 0;
    count = 0;

    $(".game-board div").click(function () {
        if ($(".content-body").hasClass("Enabled")) {
            clickAmount++;
            count++;
            $(".clicks span").html(clickAmount);

            switch (count) {
                case 1:

                    cardIdPreview = $(".preview ").attr('id');
                    cardattrPreview = $(".preview").attr("src");
                    console.log(cardattrPreview);

                    cardIdOne = $(this).attr('id');
                    cardAttrOne = $(this).find('img').attr("src");
                    console.log(cardAttrOne);
                    if (cardattrPreview == cardAttrOne) {

                        $(this).css("opacity","0");
                        $(this).addClass("disable")
                        changePreview();
                        count = 0;
                    }
                    else {
                        count = 0;
                    }
                    break;
            }


        }
        else {
            console.log("can not play yet, press start button");
        }
    });


});