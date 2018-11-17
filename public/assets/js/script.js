$(function(){

	$(document).ready(function() {

		// General

		// get current page body id and modify navbar as needed
		$('#myNavbar ul li.'+$("body").attr("id")).addClass("active").children("a").attr("href", "#");

		$("#myNavbar .class-switch").click(function(){
			$.post("switchclass.php",{ classID: $(this).attr("data-classID") }).done(function( data ) {
				location.reload();
			});
		});

		// Dashboard Page
		if($("#dashboard").length) {

			// Initialize Bloodhound and Typeahead
			$.post("getstudents.php",{ allStudents: true, classID: $("#currentClass").attr("classID") }).done(function( data ) {
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
			$('form#search-bar').submit(function(ev) {
		        ev.preventDefault();
				$(".desc").css({fontWeight:400, color:"#737373"}); //reset font from P/A
				$(".student .edit").removeClass("hidden"); // show edit button

		        if($(".form-function > li#search-student").hasClass("active")) {
			        $.post("getstudents.php",{ function:"search", name: $(this).find("input[name='name']").val(), 
			        	classID: $("#currentClass").attr("classID") }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);
		       		});

		        } else if($(".form-function > li#record-participation").hasClass("active")) {
			        $.post("getstudents.php",{ function:"participation", name: $(this).find("input[name='name']").val(), 
			        	classID: $("#currentClass").attr("classID") }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);

			        	updateNewInfo($(".student .participation"));
		       		});

		        } else if($(".form-function > li#record-absence").hasClass("active")) {
			        $.post("getstudents.php",{ function:"absence", name: $(this).find("input[name='name']").val(), 
			        	classID: $("#currentClass").attr("classID") }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);

			        	updateNewInfo($(".student .absence"));
		       		});
		        } 
		    });

			//change to placeholder when detect missing picture
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
		        var imgPath = "public/assets/img/students/"+student.classID+"/"+student.studentID+".jpg";

				$(".student .avatar > img").attr("src", imgPath);
	        	$(".student .title").html(student.name.toLowerCase()); //text transform in css
	        	$(".student .altName").html(student.altName);
	        	$(".student .id").html(student.studentID.toUpperCase());
	        	$(".student .email").html(student.email);
	        	$(".student .group").html(student.group);
	        	$(".student .participation").html(student.participation);
	        	$(".student .absence").html(student.absence);

	        	// fill modal input fields
	        	$(".modal .student input.title").val(student.name);
	        	$(".modal .student input.altName").val(student.altName);
	        	$(".modal .student input.id").val(student.studentID);
	        	$(".modal .student input.email").val(student.email);
	        	$(".modal .student input.group").val(student.group);
	        	$(".modal .student input.participation").val(student.participation);
	        	$(".modal .student input.absence").val(student.absence);

	        	$('#bloodhound .typeahead').typeahead('close').typeahead('val', "");
	        	// console.log(student);
		    }
		    function updateNewInfo(updatedField) {
		    	updatedField.closest(".desc").fadeOut(500, function(){
	        		updatedField.text(parseInt(updatedField.text())+1);
	        		if(updatedField.hasClass("participation")) {
		        		$(this).css({fontWeight: 600, color: "#4A8056"});
	        		} else {
		        		$(this).css({fontWeight: 600, color: "#B34857"});
	        		}
	        		$(this).fadeIn(400);
	        	});
		    }

		    // $('.student .edit-button').click(function(){
		    // 	// replace student info with form
		    // })
		}


		// List Page
	    if($("#list").length){
		    $('#students-list').DataTable( {
			    responsive: true,
			    searching: false,
			    paging: false
			} );
	    }

	    // Photos page
	    if($("#photos").length) {
	    	$('.grid').masonry({
			  // options
			  itemSelector: '.grid-item',
			  columnWidth: 200
			});

	    	//change to placeholder when detect missing picture
		    $(".grid-item > img").error(function(){
		        $(this).attr('src', 'public/assets/img/placeholder@200.jpg');
		    });
	    }
	});

	$(window).on("load", function() {

		// Photos page
	    if($("#photos").length) {
	    	setTimeout( function() {
	    		$('.grid').masonry({
					// options
					itemSelector: '.grid-item',
					columnWidth: 200
				});
			} , 500);
	    }

	});

});

