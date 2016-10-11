<?php 
    require("security.php");

    $currentClass = $conn->query("SELECT * FROM ta_class WHERE id='".$_SESSION['user']['lastViewedClassID']."'")->fetch_assoc();
	$classes = $conn->query("SELECT * FROM ta_class WHERE userID='".$_SESSION['user']['userID']."'");
	//$classes = $queryOutput->fetch_assoc();
	$students = $conn->query("SELECT * FROM ta_students");


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Photos | TA Helper</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
</head>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="row">
			<!-- <h2 class="page-title">TA Helper Dashboard</h2> -->
		</div>

		<div class="row">
			<ul class="nav navbar-nav navbar-right">
				<li role="presentation"><a href="./dashboard">Home</a></li>
				<li role="presentation"><a href="./list">List</a></li>
				<li role="presentation" class="active"><a href="#">Photos</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" id="currentClass" 
						classID=<? print $currentClass["id"]?> data-toggle="dropdown" 
						role="button" aria-haspopup="true" aria-expanded="false">
						<? print $currentClass["name"]?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php 
							while($row = $classes->fetch_assoc()) {
								print '<li><a href="#">'.$row["name"].'</a></li>';
							}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<body id="dashboard">
	<div class="container">

		<div class="row">
			
		</div>

	</div><!-- end container -->
	<!-- <script src="//code.jquery.com/jquery.min.map"></script> -->
	<script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/typeahead.bundle.js"></script>
    <script src="public/assets/js/script.js"></script>
</body>
</html>