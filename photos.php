<?php 
    require("header.php");
?>

<body id="photos">
	<div class="container">

		<div class="row">
			<div class="grid">
			
				<?php 
					while($row = $students->fetch_assoc()) {
						$output = '<div class="grid-item">';
						$output .= '<img alt="" src="public/assets/img/students/'.$currentClass["id"].'@200/'.$row['studentID'].'.jpg">';
						$output .= '<div class="name">'.$row["name"].'</div>';
						$output .= '<div class="name altName">'.$row["altName"].'</div>';
						$output .= "</div>";
						print $output;
						//'<div class="col-lg-2 col-md-3 col-sm-6"><img alt="" src="public/assets/img/students/'.$currentClass["id"].'/'.$row['studentID'].'.jpg"></div>';
					}
				?>
			</div>
		</div>

	</div><!-- end container -->
	<!-- <script src="//code.jquery.com/jquery.min.map"></script> -->
	<script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/typeahead.bundle.js"></script>
    <script src="public/assets/js/script.js"></script>
    <script src="public/assets/js/masonry.pkgd.min.js"></script>
</body>
</html>