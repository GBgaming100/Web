//get all characters
function getAllCoins() {


    $.ajax({
        type: "GET",
        dataType: "json",
        url: "http://coincap.io/front",

        success: function (data) {

            $.each(data, function (index, value) {
                if(data[index].perc.toString().indexOf("-") == -1){
                    data[index].color = "Green";
                } else {
                    data[index].color = "Red";
                }
                data[index]['coinId'] = index;
                data[index]['class-name'] = value['long'].replace(/\s/g, '');

            });
            console.log(data);


            var template = $("#all-coin-template").html();

            var renderTemplate = Mustache.render(template, data);

            $(".loader").last().addClass("hidden");

            // $(".capChange:contains('2')").css("color", "red");

            $("#coin-table").html(renderTemplate);
        }


    });

}

function globalInfo() {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "http://coincap.io/global",

        success: function (data) {

            // console.log(data);

            var btcPrice = data.btcPrice;
            var volumeAlt = data.volumeAlt;
            var volumeBtc = data.volumeBtc;
            var volumeTotal = data.volumeTotal;

            $("#BitcoinPrice").html(btcPrice);
            $("#VolumeAlt").html(volumeAlt);
            $("#VolumeBTC").html(volumeBtc);
            $("#VolumeTotal").html(volumeTotal);
        }


    });
}


//function to get a single coin
function getCoin(id) {


    //get the selected ID, use our previous presentation to get the ID.
    var coinId = $(id).attr("value");

    console.log(coinId);


    //create an AJAX-call with the selected character id.
    // The url for the AJAX-call: https://rickandmortyapi.com/api/character/2
    // the "2" is an example because in our case it should be dynamic
    // in the success: use mustache to show the data in the modal

    $.ajax({
        type: "GET",
        dataType: "json",
        url: ` http://coincap.io/page/${coinId}`,

        success: function (data) {

            // //variables are made to add a coin to the db
            var coinPrice = data['price'];
            var coinAmount = data['supply'];
            var totalValue = data['volume'];
            var coinName = data['display_name'];

            console.log(coinPrice);
            console.log(coinAmount);
            console.log(totalValue);
            console.log(coinName);

            var CoinIdData = [];
            CoinIdData = data;

            var templateModal = $("#extra-info-template").html();

            console.log(CoinIdData);


            var renderTemplateModal = Mustache.render(templateModal, CoinIdData);

            $(".templateContainer").html(renderTemplateModal);


            $(".js-modal-title").text(CoinIdData.display_name + "(" + CoinIdData.id + ")");
            $('.info-container').hide();
            $('#canvas-div').hide();

            $.get("http://coincap.io/history/7day/" + CoinIdData.id, {}, function (response) {


                console.log(response);

                var price = response.price;
                var marketCapData = response.market_cap;

                convertedPrice = price.map(function (cp) {
                    return cp[1];
                })

                convertedMarketCap = marketCapData.map(function (cp) {
                    return cp[1];
                })

                convertedLabels = price.map(function (cp) {
                    return cp[0]
                })

                $("#canvas-div").html(' <canvas id="coin-7-day-chart"></canvas>')
                $('.info-container').show();
                $('#canvas-div').show();

                $(".js-modal-price").html(coinPrice);
                $(".js-modal-cap").html(coinAmount);
                $(".js-modal-volume").html(totalValue);
                $(".js-modal-supply").html(coinName);

                $(".loaderModal").last().addClass("hidden");
                //Generate the chart with the generated data
                generateChart(convertedLabels, convertedPrice, convertedMarketCap, document.getElementById('coin-7-day-chart').getContext('2d'))
            })
        }


    });

}

//function to add coin to wallet
function addCoin(getCoinId) {

    //get the selected ID, use our previous presentation to get the ID.
    var coinId = $(getCoinId).attr("value");

    console.log(coinId);

    $.ajax({
        type: "GET",
        dataType: "json",
        url: `http://coincap.io/page/${coinId}`,
        success: function (data) {

            var CoinIdData = [];
            CoinIdData = data;

            coinPrice = CoinIdData.price;
            var coinName = CoinIdData.display_name;

            console.log(coinName)

            $("#coin_price").html(coinPrice);

            $("#amount_coins").on("input", function () {
                var coinPrice = (CoinIdData.price);
                var coinAmount = $("#amount_coins").val();
                var totalValue = coinPrice * coinAmount;

                $("#total_value").html(totalValue);
            })
            $(".coin_name").html(coinName);

            $("#js_coin_name").html(coinName);
        }
    });
}

function saveCoin(modalData) {

    modalData = $(modalData).parent();


    //variables are made to add a coin to the db
    var coinPrice = modalData.find('#coin_price').text();
    var coinAmount = modalData.find('#amount_coins').val();
    var totalValue = modalData.find('#total_value').text();
    var coinName = modalData.find('#js_coin_name').text();

    console.log(coinPrice);
    console.log(coinAmount);
    console.log(totalValue);
    console.log(coinName);


    $.ajax({
        type: "POST",
        url: "inc/add_coins_db.php",
        data: {
            coin_name: coinName,
            coin_price: coinPrice,
            amount_coins: coinAmount,
            total_value: totalValue,
        },
        success: function (data) {
            //see the console in your browser
            console.log(data);

            $("#AddModal").modal("hide");
            alert("coin has been added to your wallet")
        }
    })

}

function generateChart(chartLabels, chartPrice, chartMarketCap, charts) {

    var ctx = charts;

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: chartLabels,
            datasets: [{
                type: "line",
                label: "Price",
                borderColor: '#3e95cd',
                yAxisID: "y-axis-0",
                data: chartPrice,
            },
                {
                    type: "line",
                    label: "Marketcap",
                    borderColor: '#c45850',
                    yAxisID: "y-axis-1",
                    data: chartMarketCap,
                }


            ]
        },
        // Configuration options go here
        options: {
            scales: {
                xAxes: [{
                    stacked: true,
                    type: 'time',
                    position: 'bottom',
                    time: {
                        tooltipFormat: "DD-MM-YYYY",
                        unit: 'day'
                    },
                    ticks: {
                        minRotation: 45,
                        maxRotation: 45
                    }
                }],
                yAxes: [{
                    position: "right",
                    id: "y-axis-0",
                }, {
                    position: "left",
                    id: "y-axis-1",
                }]
            },
            elements: {point: {radius: 0}}

        }
    });
}

$(document).ready(function () {

    //load all characters @ start
    getAllCoins();
    //load global information on head of the page
    globalInfo();


    //On click to get a character
    $("#coin-table").on("click", ".info-btn", function () {

        $("#exampleModal").modal("show");

        getCoin(this);

    });

    $(document).on("click", ".add_btn", function () {

        $("#AddModal").modal("show");
        console.log(this);
        addCoin(this);
    })

    $(document).on("click", "#add_coin_btn", function () {
        saveCoin(this);
    })
});


