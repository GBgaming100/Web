function getChartInfo() {
	$.ajax({ 
		   type: "GET",
		   dataType: "json",
		   //this wil be dynamic, depends on which coin you click
		   //this is an example with Bitcoin data
		   url: "http://coincap.io/history/7day/BTC",

		   success: function(data){   

		   	//see the console in your browser
	//	   	console.log(data);

	   		//example how to select the price and market cap from our data
			var price = data.price;
			var marketCapData = data.market_cap;

			//see slide number 7 and 8, how to convert the data to usable arrays for the 
			//Chart JS library (place the code below)
			var convertedPrice = price.map(function(cp) {
				return cp[1];
            });

			var convertedCapData = marketCapData.map(function (cm) {
				return cm[1];
            })


			var convertedLabels = price.map(function (cl) {
				return cl[0];
            })

               console.log(convertedLabels);

			//Generate the chart with the generated data
			generateChart(convertedLabels, convertedPrice, convertedMarketCap)
	   		
	   }
	})
}

function generateChart(chartLabels, chartPrice, chartMarketCap) {

		var ctx = document.getElementById('coin-7-day-chart').getContext('2d');

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

	//load chart
	getChartInfo();

	

});


