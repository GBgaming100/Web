var search = "";
var filter = "ORDER BY p.name ASC";
var catogoriesOption = [];

$( document ).ready(function() {

	sizeImages();

	checkbox("cat-check", "All");

	searchName();
  	productfilter();
  	catergoryfilter();
  	getproducts();

	loadCF();

	flipCards();

  	addToCard();

  	gotovending();

});

$( window ).resize(function(){
	checkWitdh();
	cardHeights();
	sizeImages();
});

$(window).load(function(){

	setTimeout(function() {cardHeights(); checkWitdh(); console.log("edited")}, 20);


})
function sizeImages()
{
	imgWidth(".landing-product", "#landing-img");

}

function cardHeights()
{

	$.each($("#products").find(".price-container"), function(index, value)
	{
		var imgHeight = $(this).find('img').height();
		$(this).height(imgHeight);
	})
}

function flipCards()
{
	$("body").on("click", ".price-container", function()
    {

    	var turnedCard = this;
        $(turnedCard).find('.card--front').toggleClass('card--front--flip');
        $(turnedCard).find('.card--back').toggleClass('card--back--flip');


        $(".price-container").each(function()
        {
        	if (this != turnedCard) 
        	{

        			$(this).find('.card--front').removeClass('card--front--flip');

    				$(this).find('.card--back').removeClass('card--back--flip');

        	}
        });
    });
}

function checkWitdh()
{
	var windowWidth = $(window).width();

	$("body").find(".price-container").removeClass("col-6");

	$("body").find(".price-container").removeClass("col-12");

	$("body").find(".price-container").removeClass("col-lg-3");

	if(windowWidth < 450)
	{
		$("body").find(".price-container").addClass("col-12");
	}
	else if (windowWidth < 1000)
	{
		$("body").find(".price-container").addClass("col-6");
	}
	else
	{
		$("body").find(".price-container").addClass("col-lg-3");
	}
}

function addToCard()
{
	$("body").on("click", ".btn-addToCard", function()
	{

		var id = $(this).val();
		var vending = 1;

		console.log(id);

		$.ajax({ 
			type: "POST",
			dataType: "json",
			data: {
				productId: id,
				vendingId: vending
			},

			url: "inc/card/addToCard.php"
			
		});

		getCard();


	});
}

function loadCF()
{

	$.ajax({ 
			type: "GET",
			dataType: "json",

			url: "inc/product/extra.php",

			success: function(data)
			{  

				mustache(data['categories'], "#categories-template", "#categories");
				mustache(data['filters'], "#filters-template", "#filters");

			}
		});

}
function searchName()
{
	$("#search").on("input", function()
	{
		search = $(this).val();

		getproducts();
	});
}

function productfilter()
{
	$("body").on("change", ".filter-check", function(){

		filter = $(this).val();

		getproducts();
	});
}

function catergoryfilter(){
	$("body").on("change", ".cat-check", function(){

		if( $(this).val() == "All")
		{
			catogoriesOption = [];
		}
		else
		{

			if ($(this).is(':checked')) 
			{
				catogoriesOption.push($(this).val());
			}
			else
			{
				var removeItem = $(this).val();   // item do array que deverÃƒÂ¡ ser removido
 
				catogoriesOption = jQuery.grep(catogoriesOption, function(value) {
			        return value != removeItem;
			      });
			}
		}
		getproducts();
	});
	
}

function getproducts()
{
	console.log("run");

	$.ajax({ 
			type: "POST",
			dataType: "json",
			data: 
			{
				search: search,
				filter: filter,
				categories: catogoriesOption
			},

			url: "inc/product/allproducts.php",

			success: function(data)
			{  

				mustache(data, "#products-templates", "#products");

				cardHeights();
				cardHeights();

			}
		});
}

function checkbox(className, all)
{
	className = "." + className;
	
	allCheckbox = className+':input[value='+all+']';
	otherCheckboxes = className+':input[value!='+all+']';

	$(document).on('click', className, function() {

		if (this.value == all) 
		{
			$(className).not(this).prop('checked', false);
			$(this).prop('checked', true);
		}
		else
		{
			totalUnChecked = 0;


			$.each($(otherCheckboxes), function(index, value){
				if ($(value).prop('checked') == true)
				{
					totalUnChecked = (index + 1);
				}
			});
		    if (totalUnChecked == 0 )
		    { 
				$(allCheckbox).prop('checked', true);
			}
			else
			{
				$(allCheckbox).prop('checked', false);
			}
		}
	});
}

function gotovending()
{
	$(".dblVending").dblclick(function(){

		var url = $(this).data("link");

		window.location = url;
	});
}