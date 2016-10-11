<?php 
require("config.php");

// Assumes all names are unique, fetches first match
if( $_REQUEST["name"])
{
	$studentName = $_REQUEST["name"];
	$classID = $_REQUEST["classID"];
	$queryOutput = $conn->query("SELECT * FROM ta_students AS s
				WHERE s.name='".$studentName."' AND s.classID='".$classID."'");
	$student = $queryOutput->fetch_assoc();

	if($_REQUEST["function"] == "participation") {
		$participation = intval($student["participation"])+1;

		$conn->query("UPDATE ta_students AS s
				SET s.participation=".$participation."
				WHERE s.name='".$studentName."' AND s.classID='".$classID."'");

	} else if($_REQUEST["function"] == "absence") {
		$absence = intval($student["absence"])+1;

		$conn->query("UPDATE ta_students AS s
				SET s.absence=".$absence."
				WHERE s.name='".$studentName."' AND s.classID='".$classID."'");
	}


	echo json_encode($student);


} else if($_REQUEST["allStudents"]) {

	$classID = $_REQUEST["classID"];
	$queryOutput = $conn->query("SELECT * FROM ta_students WHERE classID=".$classID);

	$outputArray = array();

	while($row = $queryOutput->fetch_assoc()) {
		array_push($outputArray, $row["name"]);
	}

	echo json_encode($outputArray);
}

?>