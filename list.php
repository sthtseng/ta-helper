<?php 
  require("security.php");

	$students = $conn->query("SELECT * FROM ta_students as s
							ORDER BY s.group ASC, s.name ASC");


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>List | TA Helper</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
</head>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="row">
			<!-- <h2 class="page-title">TA Helper Dashboard</h2> -->
		</div>

		<div class="row">
			<ul class="nav navbar-nav navbar-center">
				<li role="presentation"><a href="./dashboard">Home</a></li>
				<li role="presentation" class="active"><a href="#">List</a></li>
				<li role="presentation"><a href="./top">Top 10</a></li>
			</ul>
		</div>
	</div>
</nav>

<body id="list">
	<div class="container">

		<div class="row">
			<table id="students-list" class="table table-hover display nowrap" width="100%" data-order='[[ 3, "asc" ],[ 1, "asc" ]]'>
				<thead>
					<tr>
						<th>ID</th>
						<th data-priority="1">Name</th>
						<th>Email</th>
						<th data-priority="2">Group</th>
						<th data-priority="3">Participation</th>
						<th data-priority="4">Absence</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($row = $students->fetch_assoc()) {
			    	echo '<tr data-id="'.$row["studentID"].'">
			    	<td>'.$row["studentID"]. '</td>
			    	<td>'.$row["name"]. '</td>
			    	<td>'.$row["email"]. '</td>
			    	<td>'.$row["group"]. '</td>
			    	<td>'.$row["participation"]. '</td>
			    	<td>'.$row["absence"]. '</td></tr>';
			    }

					?>
				</tbody>
			  
			</table>
		</div>


	</div><!-- end container -->
	<script src="//code.jquery.com/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.js"></script>
    <script src="public/assets/js/typeahead.bundle.js"></script>
    <script src="public/assets/js/script.js"></script>
</body>
</html>