<?php
$host = "localhost";
$uname = "root";
$pass = "";
$database = "teachercollage";

$conn=mysqli_connect($host,$uname,$pass) or die("connection in not ready <br>");
mysqli_select_db($conn,$database) or die("database cannot be selected <br>");

if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysqli_query ($conn,"SELECT * FROM basic_information WHERE university_ID LIKE '%{$query}%'");
	$array = array();
	
	while ($row = mysqli_fetch_assoc($sql)) {
		$array[] = $row['university_ID'];
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
