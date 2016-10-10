<?php 
    require("security.php");

	$students = $conn->query("SELECT * FROM ta_students");


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Dashboard | TA Helper</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
</head>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="row">
			<!-- <h2 class="page-title">TA Helper Dashboard</h2> -->
		</div>

		<div class="row">
			<ul class="nav navbar-nav navbar-center">
				<li role="presentation" class="active"><a href="#">Home</a></li>
				<li role="presentation"><a href="./list">List</a></li>
				<li role="presentation"><a href="./top">Top 10</a></li>
			</ul>
		</div>
	</div>
</nav>

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

			        	<form id="search-student" name="searchStudents" target="_self" action="getstudents.php" method="post">

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
				            <div class="title">GMBA7061 Student</div>
				            <div class="desc"><span class="id">Student ID</span></div>
				            <div class="desc"><span class="email">Student Email</span></div>
				            <div class="desc">Group Number: <span class="group"></span></div>
				            <div class="desc">Participation: <span class="participation"></span></div>
				            <div class="desc">Absence: <span class="absence"></span></div>
				        </div>
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