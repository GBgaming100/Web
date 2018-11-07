$(document).ready(function(){
	switchView();

	getDateInfo();
	thisDay();
	ViewMonth();

	changeName();
	changeColor();
	changeTime();

	addTask();
});
var days = ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"];
var months = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober" , "November" , "December"];

var dd ="";
var dn = "";
var mm ="";
var ww="";
var yyyy ="";

function getDateInfo()
{
	var today = new Date();

    dd = today.getDate();
    mm = today.getMonth();

    ww = today.getWeek()

    dn = today.getDay();

    yyyy = today.getFullYear();
}

function switchView()
{
	$(".tabs").on("click", function()
	{
		console.log($(this).attr('href'));

		$('.container').not($(this).attr('href')).hide();
		$($(this).attr('href')).show();

		if ($(this).attr('href') == "#today") {thisDay()}
		else if ($(this).attr('href') == "#week") {thisWeek()}
		else if ($(this).attr('href') == "#month") {thisMonth()}


	});
}

function thisDay()
{
	$(".nav-header").text(days[dn] + " " + dd + " " + months[mm]);
	todayItems();
}

function thisWeek()
{
	$(".nav-header").text("Week: " + ww);
}

function thisMonth()
{
	$(".nav-header").text(months[mm] + " " + yyyy);
}

Date.prototype.getWeek = function() {
      var onejan = new Date(this.getFullYear(),0,1);
      var today = new Date(this.getFullYear(),this.getMonth(),this.getDate());
      var dayOfYear = ((today - onejan +1)/86400000);
      return Math.ceil(dayOfYear/7)
    };

function mustache(data, template, outerTemplate)
{
	
	if ($(outerTemplate).data('template')) 
		{
			var template = $(outerTemplate).data('template');
		}
	else
		{
			var template = $(template).html();
			$(outerTemplate).data('template', template);
		}

	var renderTemplate = Mustache.render(template, data);

	$(outerTemplate).html(renderTemplate);
}

function ViewMonth()
{
month = Calendar((mm - 1), yyyy);

// console.table(month)
mustache(month, "#month-template", ".months")
}

function Calendar(month, year) {
	monthArray = [];

  var now = new Date();

  // test if input date is correct, instead use current month
  this.month = (isNaN(month) || month == null) ? now.getMonth() + 1 : month;
  this.year = (isNaN(year) || year == null) ? now.getFullYear() : year;

  var logical_month = this.month - 1;

  // get first day of month and first week day
  var first_day = new Date(this.year, logical_month, 1),
      first_day_weekday = first_day.getDay() == 0 ? 7 : first_day.getDay();

  // find number of days in month
  var month_length = new Date(this.year, this.month, 0).getDate(),
      previous_month_length = new Date(this.year, logical_month, 0).getDate();

  var day  = 1, // current month days
      prev = 1, // previous month days
      next = 1; // next month days

  // weeks loop (rows)
  for (var i = 0; i < 9; i++) {
    // weekdays loop (cells)
    for (var j = 1; j <= 7; j++) {
      if (day <= month_length && (i > 0 || j >= first_day_weekday)) {

      	extra = "";

      	if (j == 7) {extra = 'w-100';}

        monthArray.push({"days": day, "class": "Maarten", "extra": extra});
        day++;
        
      } else {
        if (day <= month_length) {

          monthArray.push({"days": previous_month_length - first_day_weekday + prev + 1, "class": "d-none d-sm-inline-block bg-light text-muted"})

          prev++;
        } else {

          // monthArray.push({"days": next, "class": "d-none d-sm-inline-block bg-light text-muted"})

          next++;
        }
      }
    }
  }

  return monthArray;


}

function print() {
    window.print();
}

function todayItems()
{
	getDateInfo();
	if (mm < 10) {todayMonth = "0"+ (mm+1);}else{todayMonth = (mm+1);}
	todaysData = yyyy+ "-" + todayMonth + "-" + dd;
    $("#taskDate").val(todaysData);

	console.log(todaysData);

	$.ajax({ 
			   type: "GET",
			   url: "data/getTodayItems.php",
			   data:{
		       		currentDate: todaysData
		       },

			   success: function(data){  

			   tasks = jQuery.parseJSON(data); 

			   	console.table(tasks);

			   	mustache(tasks, "#todaysTask-template", "#todaysTask");

		   }
		})
}
var preview_body = "#ef4d4e";
var preview_title = "Naamloze Taak" ;
var preview_start = $("#taskStart").val();
var preview_end = $("#taskEnd").val();

function changeName()
{
	$("#taskName").on("input", function(){
		preview_title = this.value;
		changePreview();
	});
}

function changeTime()
{
	$("#taskStart").on("input", function(){
		preview_start = this.value;
		changePreview();
	});

	$("#taskEnd").on("input", function(){
		preview_end = this.value;
		changePreview();
	});
}

function changeColor()
{
	$("input[name='color']").on("change", function(){
		preview_body = this.value;
		changePreview();
	});
}

function changePreview()
{
	$(".preview-body").css("border-color", preview_body);
	$(".preview-title").text(preview_title);
	$(".preview-start").text(preview_start);
	$(".preview-end").text(preview_end);

}

function addTask()
{
	$("#add-task").on("click", function(){
		date = $('#taskDate').val();

		console.log("title = " + preview_title);
		console.log("date = " + date);
		console.log("start time = " + preview_start);
		console.log("end time = " + preview_end);
		console.log("color = " + preview_body);

		$.ajax({ 
		   type: "POST",
		   dataType: "json",
		   data: {
		   	taak_name: preview_title,
		   	taak_color: preview_body,
		   	taak_date: date,
		   	taak_time_from: preview_start,
		   	taak_time_till: preview_end

		   },
		   url: "data/addNewtask.php",

		   success: function(){  

		   		console.log("posted");
			}
		});
		todayItems();
	});

}