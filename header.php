<?php 
    require("security.php");

    $currentClass = $conn->query("SELECT * FROM ta_class WHERE id='".$_SESSION['user']['lastViewedClassID']."'")->fetch_assoc();
	$classes = $conn->query("SELECT * FROM ta_class WHERE userID='".$_SESSION['user']['userID']."'");
	$students = $conn->query("SELECT * FROM ta_students WHERE classID='".$_SESSION['user']['lastViewedClassID']."'");

	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Dashboard | TA Helper</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
</head>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./dashboard">TA Helper</a>
		</div>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li role="presentation" class="dashboard"><a href="./dashboard">Home</a></li>
				<li role="presentation" class="list"><a href="./list">List</a></li>
				<li role="presentation" class="photos"><a href="./photos">Photos</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" id="currentClass" 
						classID=<? print $currentClass["id"]?> data-toggle="dropdown" 
						role="button" aria-haspopup="true" aria-expanded="false">
						<? print $currentClass["name"]?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php 
							while($row = $classes->fetch_assoc()) {
								print '<li><a href="#" class="class-switch" data-classID="'.$row["id"].'">'.$row["name"].'</a></li>';
							}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>