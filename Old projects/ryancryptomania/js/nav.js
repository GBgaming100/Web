$(document).ready(function(){
  include("include/nav.html","body")
  $('.js-nav-items').removeClass('active');
  $('.js-'+top.location.pathname.split('/')[2].split('.')[0]).addClass('active')

  var loggedIn = false;


  $.post("include/session.php",{
  }, function(response,status){
    console.log(response)
    response = JSON.parse(response)
    if(response.loggedIn == true){
      loggedIn = true;
      toggleLogIn(loggedIn)
    }else{
      toggleLogIn(loggedIn)
    }
  })

  $('body').on('click', '.js-logout', function(){
    loggedIn = false
    // console.log("js-logout")
    $.post("include/session.php",{
      loginSet: false
    }, function(response,status){
      console.log(response)
      toggleLogIn(loggedIn)
    })
  })

  $('body').on('click','.js-login',function(){
    $.post( "include/getUsers.php",{
    }, function(response, status){
      response = JSON.parse(response)
      for(var i = 0; i < response.length; i++){
        if($('.js-username').val() == response[i].username && $('.js-password').val() == response[i].password){
          loggedIn = true;
          $.post("include/session.php",{
            loginSet: true
          }, function(response,status){
            console.log(response)
            toggleLogIn(loggedIn)
          })
        }
      }
      if(loggedIn == false){
        $.post("include/session.php",{
          loginSet: false
        }, function(response,status){
          console.log(response)
          toggleLogIn(loggedIn)
        })
      }
    })
  })
});

function toggleLogIn(status){
  if(status == true){
    $(".js-logIn").addClass("hidden")
    $(".js-loggedIn-text").removeClass("hidden")
    $(".js-portfolio").removeClass("hidden")
  }else{
    $(".js-logIn").removeClass("hidden")
    $(".js-loggedIn-text").addClass("hidden")
    $(".js-portfolio").addClass("hidden")
    if(top.location.pathname.split('/')[2].split('.')[0] == "portfolio"){
      window.location.replace("index.html")
    }
  }
}
