$(document).ready(function(){
  var user = [];
  var coins  = [];
  var character;
  var boughtCoins = [];
  var deleteIndex;

  $.get("http://coincap.io/front",{
  },function(response,status){
    console.log(response);
    character = response;

    $.post("include/session.php",{
    }, function(response,status){
      user = JSON.parse(response)
      $.post("include/getCoins.php",{
        userId: user.userID
      }, function(response,status){
        coins = JSON.parse(response)
        var temp_array = [];
        for (var i = 0; i < coins.length; i++) {
          if(temp_array.indexOf(coins[i].coinId)){
            temp_array.push(coins[i].coinId);
          }
        }
        for (var i = 0; i < character.length; i++) {
          for(var j = 0; j < temp_array.length; j++){
            if(temp_array[j] == character[i].short){
              boughtCoins.push(character[i])
            }
          }
        }
        coins.map(function(cp,j){
          for(var i = 0 ; i < boughtCoins.length;i++){
            if(cp.coinId == boughtCoins[i].short){
              cp.short = boughtCoins[i].short;
              cp.long = boughtCoins[i].long;
              cp.newPrice = boughtCoins[i].price;
              cp.index = j;
            }
          }
        })
        console.log(coins)

        var template = $("#crypto-porfolio").html();

        var renderTemplate = Mustache.render(template, coins);

        $("#porfolio-table").html(renderTemplate);

        for(var i = 0; i < coins.length; i++){
          updateTotal(i)
        }
      })
    })
  })

  $('body').on('change keyup paste',".amount",function(){
    var id = $(this).parent().parent().attr("id").split("_")[1]
    coins[id].amount = $(this).val();
    updateTotal(id);

  })

  $('body').on('click','.js-delete',function(){
    deleteIndex = $(this).attr("id").split("_")[1];
    confirmModal("confirm","Are you sure you want to delete this item", "js-delete-confirm")
  })

  $("body").on('click', '.js-delete-confirm',function(){
    console.log(deleteIndex)
    console.log("delete")
    $.post("include/deleteCoins.php",{
      id: coins[deleteIndex].id,
    }, function(response,status){
      if(response == "succes"){
        // coins.splice(deleteIndex,1);
        $("#rowNum_"+deleteIndex).remove();
        $(".js-confirm").modal("hide")
        succesPopup("succesfully deleted")
      }
    })
  })

  $('body').on('click','.js-save',function(){
    var row = $(this).attr("id").split("_")[1];
    $.post("include/updateCoins.php",{
      id: coins[row].id,
      amount: $(".js-amount_"+row).val()
    }, function(response,status){
      succesPopup("succesfully updated")
    })
  })

  function updateTotal(id){
    console.log(coins[id])
    $('.boughtPrice_' + id).text(coins[id].amount * coins[id].price);
    $('.currentPrice_' + id).text(coins[id].amount * coins[id].newPrice);
  }
});
