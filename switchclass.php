<?php 
require("config.php");

// Assumes all names are unique, fetches first match
if( $_REQUEST["classID"])
{
	$classID = $_REQUEST["classID"];
	$conn->query("UPDATE ta_users_tbl AS u
				SET u.lastViewedClassID=".$classID."
				WHERE u.userID=".$_SESSION['user']['userID']);
	
	$_SESSION['user'] = $conn->query("SELECT * FROM ta_users_tbl
            				WHERE username='". $_SESSION['user']['username']."' 
            				AND isActive='y'")->fetch_assoc();

	echo json_encode($_SESSION['user']);

}

?>