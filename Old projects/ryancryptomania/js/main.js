var attrs = ['id'];
function resetAttributeNames(section) {
    var tags = section.find('div,td,input,th,h4,img,h6,p'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
          $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx)))
        }
      })
    })
}

function repeatClass(repeatedClass){
  var lastRepeatingGroup = $('.'+repeatedClass+'').last();
  var cloned = lastRepeatingGroup.clone(true)
  cloned.insertAfter(lastRepeatingGroup);
  resetAttributeNames(cloned)
}

function succesPopup(message,timeout){
  if(timeout == undefined){
    timeout = 2.5
  }
  var a_message = "";
  a_message += "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
  a_message +=  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  a_message +=  "<strong>Succes!</strong> "+message;
  a_message += "</div>";
  $('body').prepend(a_message)

  if(timeout != 0){
    setTimeout(function () {
      $('.alert').alert('close')
    }, timeout*1000);
  }
}

function errorPopup(message,timeout){
  if(timeout == undefined){
    timeout = 2.5
  }
  var a_message = "";
  a_message += "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
  a_message +=  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  a_message +=  "<strong>Error!</strong> "+message;
  a_message += "</div>";
  $('body').prepend(a_message)

  if(timeout != 0){
    setTimeout(function () {
      $('.alert').alert('close')
      console.log('close')
    }, timeout*1000);
  }
}

function warningPopup(message,timeout){
  if(timeout == undefined){
    timeout = 2.5
  }
  var a_message = "";
  a_message += "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
  a_message +=  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  a_message +=  "<strong>Warning!</strong> "+message;
  a_message += "</div>";
  $('body').prepend(a_message)

  if(timeout != 0){
    setTimeout(function () {
      $('.alert').alert('close')
      console.log('close')
    }, timeout*1000);
  }
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function uppercase(str){
  var array1 = str.split(' ');
  var newarray1 = [];

  for(var x = 0; x < array1.length; x++){
      newarray1.push(array1[x].charAt(0).toUpperCase()+array1[x].slice(1));
  }
  return newarray1.join(' ');
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function generateChart(chartLabels, chartPrice, chartMarketCap, chart) {

		var ctx = chart;

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

function include(location,container){
    $.ajax({ type: "GET",
       url: location,
       async: false,
       success : function(text)
       {
           var response= text;
           $(container).prepend(response);
       }
    });
}

var confirmClassOld = "";
var deleteClassOld = "";
function confirmModal(title, body, confirmClass, deleteClass){
    if(deleteClass == undefined){
        deleteClass = "close-confirm"
    }
    if(confirmClass != "" && deleteClassOld != ""){
        $('.confirm-save-change').removeClass(confirmClassOld)
        $('.confirm-delete-change').removeClass(deleteClassOld)
    }
    $('.confirm-save-change').addClass(confirmClass)
    $('.confirm-delete-change').addClass(deleteClass)

    confirmClassOld = confirmClass;
    deleteClassOld = deleteClass;

    $('.confirm-title').text(title)
    $('.confirm-text').text(body)

    $('.js-confirm').modal("show")
}
