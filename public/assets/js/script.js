$(function(){

	$(document).ready(function() {
		// var students = 
		$.post("getstudents.php",{ allStudents: true }).done(function( data ) {
			var studentNames = $.parseJSON(data);


			// constructs the suggestion engine
			var students = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.whitespace,
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  local: studentNames
			});

			$('#bloodhound .typeahead').typeahead({
			  hint: true,
			  highlight: true,
			  minLength: 1
			},
			{
			  name: 'students',
			  source: students
			});
		});

		// trigger autocomplete of typeahead before submit
		$('form#search-student').submit(function(ev) {
	        ev.preventDefault();
	        if($(".form-function > li#search-student").hasClass("active")) {
		        $.post("getstudents.php",{ function:"search", name: $(this).find("input[name='name']").val() }).done(function( data ) {
		        	var student = $.parseJSON(data);
		        	printStudentInfo(student);
	       		});

	        } else if($(".form-function > li#record-participation").hasClass("active")) {
		        $.post("getstudents.php",{ function:"participation", name: $(this).find("input[name='name']").val() }).done(function( data ) {
		        	var student = $.parseJSON(data);
		        	printStudentInfo(student);
		        	//time out then add participation
	       		});

	        } else if($(".form-function > li#record-absence").hasClass("active")) {
	        	console.log('posting to absence')
		        $.post("getstudents.php",{ function:"absence", name: $(this).find("input[name='name']").val() }).done(function( data ) {
		        	var student = $.parseJSON(data);
		        	printStudentInfo(student);
		        	//time out then add absence
	       		});
	        } 
	    });

	    $(".student .avatar > img").error(function(){
	        $(this).attr('src', 'public/assets/img/placeholder.jpg');
	    });

	    $(".form-function > li > a").click(function(){
	    	if($(this).hasClass("search")) { //switching to search mode
	    		$("input.typeahead.tt-input").attr("placeholder", "Search Student Name");
	    		$(".form-submit-btn").removeClass("glyphicon-ok").addClass("glyphicon-search");
	    	} else { // switching to record mode
	    		$("input.typeahead.tt-input").attr("placeholder", "Enter Student Name");
	    		$(".form-submit-btn").removeClass("glyphicon-search").addClass("glyphicon-ok");
	    	}
	    	$(".form-function > li").removeClass("active");
	    	$(this).closest("li").addClass("active");

	    	$(".typeahead.tt-input").focus();
	    });

	    function printStudentInfo(student){
	        var imgPath = "public/assets/img/students/"+student.id+".jpg";

			$(".student .avatar > img").attr("src", imgPath);
        	$(".student .title").html(student.name.toLowerCase()); //text transform in css
        	$(".student .id").html(student.id.toUpperCase());
        	$(".student .email").html(student.email);
        	$(".student .participation").html(student.participation);
        	$(".student .absence").html(student.absence);

        	$('#bloodhound .typeahead').typeahead('close').typeahead('val', "");
        	console.log(student);
	    }

	});

});

