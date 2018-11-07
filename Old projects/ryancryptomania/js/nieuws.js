
$(document).ready(function(){
  $.get("https://newsapi.org/v2/everything?sources=crypto-coins-news&apiKey=c775ab0575d94615b8cc279f4572bdee",{
  },function(response,status){
    console.log(response);
    var articles = response.articles
    console.log(articles)
    $('.js-loader').addClass('hidden')

    var template = $("#all-characters-template").html();

    var renderTemplate = Mustache.render(template, articles);

    $("body").append(renderTemplate);
  })
})
