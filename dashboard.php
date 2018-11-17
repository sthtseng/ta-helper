<?php 
    require("header.php");
?>

<body id="dashboard">
	<div class="container">

		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

					<ul class="nav nav-tabs nav-justified form-function">
					  <li role="presentation" class="active" id="search-student"><a href="#" class="search">Search</a></li>
					  <li role="presentation" id="record-participation"><a href="#">Record Participation</a></li>
					  <li role="presentation" id="record-absence"><a href="#">Record Absense</a></li>
					</ul>

			    <div class="card hovercard">
			        <div class="cardheader">

			        	<form id="search-bar" name="searchStudents" target="_self" action="getstudents.php" method="post">

									<div class="input-group input-group-lg" id="bloodhound">

										<input class="form-control typeahead" type="text" name="name" placeholder="Search Student Name">

										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><span class="form-submit-btn glyphicon glyphicon-search" aria-hidden="true"></span></button>
										</span>

									</div>
								</form>
			        </div>

			        <div class="student">
				        <div class="avatar">
				            <img alt="" src="public/assets/img/placeholder.jpg">
				        </div>
				        <div class="info">
				            <div class="title"><? print $currentClass["name"]?> Student</div>
				            <div class="desc"><span class="altName">Alternative Name</span></div>
				            <div class="desc"><span class="id">Student ID</span></div>
				            <div class="desc"><span class="email">Student Email</span></div>
				            <div class="desc">Group Number: <span class="group"></span></div>
				            <div class="desc">Participation: <span class="participation"></span></div>
				            <div class="desc">Absence: <span class="absence"></span></div>
				            <div class="edit hidden">
				            	<a href="#" class="edit-button" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				            </div>
				        </div>
				      </div>
			    </div>

			</div>
		</div>

		<!-- Edit Modal -->
			<div class="modal fade" id="editModal" role="dialog">
				<div class="modal-dialog">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Student</h4>
						</div>
						<div class="modal-body student">
							<input type="text" class="form-control title">
							<input type="text" class="form-control altName">
							<input type="text" class="form-control id">
							<input type="text" class="form-control email">
							<input type="text" class="form-control group">
							<input type="text" class="form-control participation">
							<input type="text" class="form-control absence">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				  
				</div>
			</div>

	</div><!-- end container -->
	<!-- <script src="//code.jquery.com/jquery.min.map"></script> -->
	<script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/typeahead.bundle.js"></script>
    <script src="public/assets/js/script.js"></script>
</body>
</html>