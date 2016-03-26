<?php
	require("config.php");
	#keeps users from requesting any file they want
	$safe_pages = array("login", "dashboard");

	if(in_array($requestedPage, $safe_pages)) {
	  include($requestedPage.".php");
	} else if($requestedPage==""){
		include("login.php");
	}	else{
	  include("404.php");
	}

?>