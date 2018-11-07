//get all characters
function getNews() {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://newsapi.org/v2/top-headlines?sources=crypto-coins-news&apiKey=ea498f59bc0f4ec399865d692de01f3a",

        success: function (data) {


            data = data['articles'];

                console.log(data);

            var	template = $("#all-coin-template").html();

            var	renderTemplate = Mustache.render(template, data);

            $("#newsFeed").html(renderTemplate);
        }
    });
}

$(document).ready(function () {

    //load all characters @ start
    getNews();


});


