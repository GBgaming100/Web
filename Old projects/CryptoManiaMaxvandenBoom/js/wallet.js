function getallCoinsWallet() {

    //literly stolen from the powerpoint presentation
    $.ajax({
        type: "POST",
        url: "inc/get_coins_db.php",
        dataType: "json",

        success: function (data) {
            console.table(data);


            var template = $("#all-coins-template").html();

            var renderTemplate = Mustache.render(template, data);

            $("#crypto-folio-table").html(renderTemplate);
        }
    })
}

function updateCoin(getSaveButton) {

    var row = $(getSaveButton).closest("tr");

    //variables are made to update everything that is changed in the table
    var coinName = row.find('.coin-name').text();
    var coinId = row.find('.coin-id').text();
    var coinAmount = row.find('.amount-input').val();
    var coinValue = row.find('.coin-value').text();
    //makes it a global variable that i can use everywhere
    var coinPrice = "";

    //this ajax part will update the bitcoin price to the current price that is available
    //i still dont know how this works but it works
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "http://coincap.io/front",

        success: function (data) {

            $.each(data, function (index, value) {
                if (data[index]['long'] == coinName) {
                    coinPrice = data[index]['price'];
                }
            })

            console.log(coinPrice);

            coinValue = coinPrice * coinAmount;

            //this updates the database with the changed variables
            //stole this from the powerpoint presentation
            $.ajax({
                type: "POST",
                url: "inc/save_coin_db.php",
                data: {
                    coin_name: coinName,
                    coin_Id: coinId,
                    coin_Price: coinPrice,
                    coin_Amount: coinAmount,
                    coin_Value: coinValue,
                },

                success: function (data) {

                    //see the console in your browser
                    console.log(data);

                    getallCoinsWallet();


                }
            })
        }
    });
}

function deleteCoin(getDeleteButton) {

    var coinId = $(getDeleteButton).attr("value");


    $.ajax({
        type: "POST",
        url: "inc/delete_coin_db.php",
        data: {
            coin_Id: coinId,
        },
        success: function (data) {
            console.log(data);

            getallCoinsWallet();
        }
    })
}

$(document).ready(function () {
    //get all coins that are in wallet
    getallCoinsWallet();

    //On click event to update the amount of coins and current price of the bitcoin
    $(document).on("click", ".save-coin-btn", function () {
        //opens dialog to make sure you want to update the coin
        if (confirm('Are you sure you want to update this coin')) {
            updateCoin(this);
        } else {
            //do nothing
        }

    });

    $(document).on("click", ".delete-coin-btn", function () {
        if (confirm('Are you sure you want to delete this coin from your wallet')) {
            deleteCoin(this);
        }
    })
});
