var character = [];
$(document).ready(function(){
  var updatedCharacters = [];
  var addCoinClick = false;
  var clickedCoin = [];
  var user = [];


  var socket = io.connect('https://coincap.io');
  socket.on('trades', function (tradeMsg) {
    if(updatedCharacters.indexOf(tradeMsg.message.coin) == -1){
      updatedCharacters.push(tradeMsg.message.coin)
    }
    for(var i = 0 ; i < character.length; i++){
      if(character[i].short == tradeMsg.message.coin){
        character[i] = tradeMsg.message.msg;
      }
    }
  })

  function updateDataList() {
    renderList();

    for(var i = 0; i < updatedCharacters.length; i++){
      // $(".update-row-"+updatedCharacters[i]).toggleClass("updated")
      $(".update-row-"+updatedCharacters[i]).fadeOut(100).fadeIn(800)
    }
    updatedCharacters = [];

    // setTimeout(updateDataList, 2500);
  }
  setTimeout(updateDataList, 2500);


  $.get("http://coincap.io/front",{
  },function(response,status){
    console.log(response);

    character = response;
    renderList();
    $('.js-loader').addClass("hidden")
    $('.js-table').removeClass("hidden")
  })

  $(".js-add-coin-amount").on("change keyup paste", function(){
    if($(this).val() != "" && $(this).val() > 0){
      $('.js-add-coin-total').text("$" + clickedCoin.price * $(this).val())
    }else{
      $('.js-add-coin-total').text("$0")
    }
  })

  $("body").on("click",".js-add-coin-save",function(){
    $.post("include/session.php",{
    }, function(response,status){
      user = JSON.parse(response)
      console.log(user)
      if($(".js-add-coin-amount").val() != "" && $(".js-add-coin-amount").val() > 0){
        $.post("include/saveCoin.php",{
          price: clickedCoin.price,
          coinId: clickedCoin.short,
          amount:$(".js-add-coin-amount").val(),
          user: user.userID
        }, function(response,status){
          console.log(response)
          if(response == "succes"){
            $('#add-coin-modal').modal('hide')
            succesPopup("succesfully added coins to wallet")
          }
        })
      }
    })
  })

  $('body').on('click','.js-button-add',function(){
    addCoinClick = true;
    setTimeout(function () {
      addCoinClick = false;
    }, 10);

    var a_id = $(this).attr("id").split('_')[1]
    // console.log(character[a_id])
    clickedCoin = [];
    clickedCoin = character[a_id]

    $('.js-add-coin-title').text(clickedCoin.long + "(" + clickedCoin.short + ")")
    $('.js-add-coin-price').text("$"+clickedCoin.price)
    $('.js-add-coin-amount').val("")
    $('.js-add-coin-amount').trigger("change")
    $('#add-coin-modal').modal('show')
  })

  $('body').on('click', '.js-open-modal' , function(){
    if(addCoinClick == false){
      $('.canvasContainer').html('<canvas id="coin-7-day-chart"></canvas>')
      $('.js-loader-container').removeClass("hidden")
      $('.info-container').addClass("hidden")
      $('.modal-body').addClass("preLoad")
      var id =  $(this).find('.js-id').text()

      $('.js-modal-title').text(character[id].long+"("+character[id].short+")")
      $('.js-modal-price').text("$"+character[id].price)
      $('.js-modal-cap').text("$"+character[id].mktcap)
      $('.js-modal-volume').text(character[id].volume)
      $('.js-modal-supply').text(character[id].supply)

      $.get("http://coincap.io/history/7day/" + character[id].short,{
      },function(response,status){
        console.log(response);

        var price = response.price;
  			var marketCapData = response.market_cap;

  			convertedPrice = price.map(function(cp){
  				return cp[1];
  			})

  			convertedMarketCap = marketCapData.map(function(cp){
  				return cp[1];
  			})

  			convertedLabels = price.map(function(cp){
  				return cp[0]
  			})

  			//Generate the chart with the generated data
  			generateChart(convertedLabels, convertedPrice, convertedMarketCap, document.getElementById('coin-7-day-chart').getContext('2d'))
        $('.js-loader-container').addClass("hidden")
        $('.info-container').removeClass("hidden")
        $('.modal-body').removeClass("preLoad")
      })

      $('#chartModal').modal('show');
    }
  })

  function renderList(){
    character.map(function(cp,i){
      cp.id = i;
      cp.image = cp.long.replace(/\s+/g, '').toLowerCase()
      cp.mktcap = Math.round(cp.mktcap)
      // console.log(cp.cap24hrChange.toString().indexOf("-"))
      if(cp.cap24hrChange.toString().indexOf("-") != -1){
        cp.capChangeColor = "negative"
      }else{
        cp.capChangeColor = "positive"
      }
    })

    var template = $("#all-characters-template").html();

    var renderTemplate = Mustache.render(template, character);

    $("#characters-table").html(renderTemplate);
  }
})
