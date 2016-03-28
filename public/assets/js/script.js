$(function(){

	$(document).ready(function() {

		// Dashboard Page
		if($("#dashboard").length) {

			// Initialize Bloodhound and Typeahead
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
				$(".desc").css({fontWeight:400, color:"#737373"}); //reset font from P/A

		        if($(".form-function > li#search-student").hasClass("active")) {
			        $.post("getstudents.php",{ function:"search", name: $(this).find("input[name='name']").val() }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);
		       		});

		        } else if($(".form-function > li#record-participation").hasClass("active")) {
			        $.post("getstudents.php",{ function:"participation", name: $(this).find("input[name='name']").val() }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);

			        	updateNewInfo($(".student .participation"));
			        	//time out then add participation
			        	// setTimeout(function(){
			        	// 	$(".student .participation").text(parseInt($(".student .participation").text())+1).closest(".desc").css({fontWeight: 700, color: "#4A8056"});
			        	// },700)
		       		});

		        } else if($(".form-function > li#record-absence").hasClass("active")) {
			        $.post("getstudents.php",{ function:"absence", name: $(this).find("input[name='name']").val() }).done(function( data ) {

			        	var student = $.parseJSON(data);
			        	printStudentInfo(student);

			        	updateNewInfo($(".student .absence"));

			        	// $(".student .absence").closest(".desc").fadeOut(500, function(){
			        	// 	$(".student .absence").text(parseInt($(".student .absence").text())+1);
				        // 	$(this).css({fontWeight: 600, color: "#4A8056"});
			        	// 	$(this).fadeIn(400);
			        	// });

			        	// .text(parseInt($(".student .absence").text())+1).closest(".desc").css({fontWeight: 700, color: "#4A8056"});
			        	// //time out then add absence
			        	// setTimeout(function(){

			        	// 	$(".student .absence").text(parseInt($(".student .absence").text())+1).closest(".desc").css("font-weight", 700);
			        	// },700)
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
	        	// console.log(student);
		    }
		    function updateNewInfo(updatedField) {
		    	updatedField.closest(".desc").fadeOut(500, function(){
	        		updatedField.text(parseInt(updatedField.text())+1);
		        	$(this).css({fontWeight: 600, color: "#4A8056"});
	        		$(this).fadeIn(400);
	        	});
		    }
		}


		// List Page
	    if($("#list").length){
		    $('#students-list').DataTable( {
			    responsive: true,
			    searching: false,
			    paging: false
			} );
	    }

	});

});

