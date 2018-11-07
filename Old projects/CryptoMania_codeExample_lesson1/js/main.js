//example API: https://rickandmortyapi.com/

//get all characters
function getAllCharacters() {

	$.ajax({
	   type: "GET",
	   dataType: "json",
	   url: "https://rickandmortyapi.com/api/character/",

	   success: function(data) {


           CharactersArray = data.results;

           // $.each(CharactersArray, function (index , value) {
           //     $("#characters-table").append(`<tr><td>${value.id}</td> <td>${value.name}</td> <td>${value.status}</td> <td>${value.species}</td> <td>${value.type}</td></tr>`);
           // });

		   var template = $("#all-characters-template").html();


		   var renderTemplate = Mustache.render(template, CharactersArray);

		   $("#characters-table").html(renderTemplate);

       }


	});
}

//function to get a single character
function getCharacter(id) {


	//get the selected ID, use our previous presentation to get the ID.
	var characterId = $(id).attr("value");

	console.log(characterId);



	//create an AJAX-call with the selected character id.
	// The url for the AJAX-call: https://rickandmortyapi.com/api/character/2
	// the "2" is an example because in our case it should be dynamic
	// in the success: use mustache to show the data in the modal

	$.ajax({
	   type: "GET",
	   dataType: "json",
	   url: `https://rickandmortyapi.com/api/character/${characterId}`,

	   success: function(data){

	   		console.log(data);

	   		CoinIdData = data;

           var templateModal = $("#character-modal").html();


           var renderTemplateModal = Mustache.render(templateModal, CoinIdData);

           $(".modal-content").html(renderTemplateModal);

	   }


	});

}


$(document).ready(function(){

	//load all characters @ start
	getAllCharacters();

	//On click to get a character
	$("#characters-table").on("click", ".info-btn", function(){


        getCharacter(this);

    });

	//rebuild template on close
	$('#exampleModal').on('hidden.bs.modal', function (e) {

		$('.modal-body').html("<template id='character-info-template'><h3>{{name}}</h3></template>");

	})

});


