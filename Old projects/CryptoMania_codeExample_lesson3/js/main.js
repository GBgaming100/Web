
//Function to add a coin to you cryptofolio
function addCoin() {

		var coinName = $("#coin-name").text();
		//coinPrice
		//amountCoins
		//totalValue

		$.ajax({ 
			   type: "POST",
			   url: "includes/add_coins_db.php",
			   data:{
		       		coin_name: coinName,
		       		//coinPrice
					//amountCoins
					//totalValue
		       },

			   success: function(data){   

			   	//see the console in your browser
			   	console.log(data);


		   }
		})
}



function getAllCoinsPortfolio() {

	$.ajax({ 
		   type: "GET",
		   url: "includes/get_coins_db.php",
		   dataType: "json",

		   success: function(data){   

		   	//An array is returned
		   	//Use mustache to create the table with data
		   	console.log(data);


	   }
	})
}



function saveCoin(getSaveButton) {

	coinId = $(getSaveButton).attr("value");
	
	console.log(coinId);
}


$(document).ready(function(){


	//Add a coin to the database
	$(document).on("click", "#js-add-coin-btn", function(){

		addCoin();

	});


	//On click event to update the amount of coins
	$(document).on("click", ".save-coin-btn", function(){

		saveCoin(this);

	});

	//Get all coins from the database (used for the cryptofolio.php page)
	getAllCoinsPortfolio();

	

	
});
