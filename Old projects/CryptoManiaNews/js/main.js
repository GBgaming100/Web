//get all characters
function getAllCoins() {

	$.ajax({ 
	   type: "GET",
	   dataType: "json",
	   url: "http://coincap.io/front",

	   success: function(data){

			console.log(data);

           $.each(data, function(index, value){

               data[index]['coinId'] = index;
               data[index]['class-name'] = value['long'].replace(/\s/g, '');

           });

			var	template = $("#all-coin-template").html();

			var	renderTemplate = Mustache.render(template, data);

			$("#coin-table").html(renderTemplate);

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

        success: function(data){

			var CoinIdData = [];
            CoinIdData = data;

            // var templateModal = $("#extra-info-template").html();
            //
            console.log(CoinIdData);
            //
            // var renderTemplateModal = Mustache.render(templateModal, CoinIdData);
            //
            // $(".templateContainer").html(renderTemplateModal);

            $("#exampleModal").modal("show");

            $(".js-modal-title").text(CoinIdData.display_name + "(" + CoinIdData.id + ")");

            $.get("http://coincap.io/history/7day/" + CoinIdData.id,{
            },function(response){

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
            })
        }


    });

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
            elements: { point: { radius: 0 } }

        }
    });
}



$(document).ready(function(){

	//load all characters @ start
	getAllCoins();

	//On click to get a character
	$("#coin-table").on("click", ".info-btn", function(){

		getCoin(this);

	});
});


