<?php 
require("config.php");

// Assumes all names are unique, fetches first match
if( $_REQUEST["name"])
{
	$studentName = $_REQUEST["name"];
	$queryOutput = $conn->query("SELECT * FROM ta_students AS s
				WHERE s.name='".$studentName."'");
	$student = $queryOutput->fetch_assoc();

	if($_REQUEST["function"] == "participation") {
		$participation = intval($student["participation"])+1;

		$conn->query("UPDATE ta_students AS s
				SET s.participation=".$participation."
				WHERE s.name='".$studentName."'");

	} else if($_REQUEST["function"] == "absence") {
		$absence = intval($student["absence"])+1;

		$conn->query("UPDATE ta_students AS s
				SET s.absence=".$absence."
				WHERE s.name='".$studentName."'");
	}


	echo json_encode($student);


} else if($_REQUEST["allStudents"]) {

	$queryOutput = $conn->query("SELECT * FROM ta_students");

	$outputArray = array();

	while($row = $queryOutput->fetch_assoc()) {
		array_push($outputArray, $row["name"]);
	}

	echo json_encode($outputArray);
}

?>