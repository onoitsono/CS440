<?php
$dbhost = "mysql.cs.orst.edu";
$dbuser = "cs440_onok";
$dbpass = "3216";
$dbname = "cs440_onok";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String

$queryoption = $_GET['queryoption'];
$queryoption = mysql_real_escape_string($queryoption);
echo "The query option is " .$queryoption. "<br />";
// $startdate = $_GET['startdate'];
// $startdate = mysql_real_escape_string($startdate);
// $enddate = $_GET['enddate'];
// $enddate = mysql_real_escape_string($enddate);


if($queryoption == "avg"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT AVG(TEMP) AS AverageTemp FROM $location";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	echo "The average temperature is $row[AverageTemp]";
	return;
}else if($queryoption == "max"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT * FROM $location WHERE TEMP = (SELECT MAX(TEMP) AS MaxTemp FROM $location)";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	echo "The highest temperature was $row[TEMP] on $row[DATE]<br />";
	while($row = mysql_fetch_array($qry_result)){
		echo "and $row[DATE]<br />";
	}
	return;
}else if($queryoption == "min"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT * FROM $location WHERE TEMP = (SELECT MIN(TEMP) AS MinTemp FROM $location)";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	echo "The lowest temperature was $row[TEMP] on $row[DATE]<br />";
	while($row = mysql_fetch_array($qry_result)){
		echo "and $row[DATE]<br />";
	}
	return;
}else if($queryoption == "maxstate"){
	$query = "SELECT * FROM Locations";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	$locationstring = "$row[table_name]";
	echo "$locationstring<br />";
	while($row = mysql_fetch_array($qry_result)){
		$locationstring += ", $row[table_name]";
	}
	echo "$locationstring<br />";
	$query = "SELECT * FROM $locationstring WHERE TEMP = (SELECT MAX(TEMP) FROM $location)";
	$qry_result = mysql_query($query) or die(mysql_error());
	echo "The highest temperature in the state was $row[TEMP] on $row[DATE]<br />";
	while($row = mysql_fetch_array($qry_result)){
		echo "and $row[DATE]<br />";
	}
	return;
}else if($queryoption == "datebased"){
	$startdate = $_GET['startdate'];
	$startdate = mysql_real_escape_string($startdate);
	echo "Start: " .$startdate. "<br />";
	$starte = explode('/',$startdate);
	$startdate = $starte[2] . $starte[0] . $starte[1] . "0000";
	$enddate = $_GET['enddate'];
	$enddate = mysql_real_escape_string($enddate);
	echo "End: " .$enddate. "<br />";
	$ende = explode('/',$enddate);
	if(strlen($ende[0])==1){
		$month2 = "0"+$ende[0];
	}
	if(strlen($ende[1])==1){
		$day2 = "0"+$ende[1];
	}
	$enddate = $ende[2] . $ende[0] . $ende[1] . "2359";
	
	$datequery = $_GET['datequery'];
	$datequery = mysql_real_escape_string($datequery);
	if($datequery == "maxd"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT * FROM $location WHERE TEMP = (SELECT MAX(TEMP) AS MaxTemp FROM $location) AND date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($qry_result);
		echo "The highest temperature for $startdate to $enddate was $row[TEMP] on $row[DATE]<br />";
		while($row = mysql_fetch_array($qry_result)){
			echo "and $row[DATE]<br />";
		}
	}else if($datequery == "mind"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT * FROM $location WHERE TEMP = (SELECT MIN(TEMP) AS MinTemp FROM $location) AND date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($qry_result);
		echo "The lowest temperature for $startdate to $enddate was $row[TEMP] on $row[DATE]<br />";
		while($row = mysql_fetch_array($qry_result)){
			echo "and $row[DATE]<br />";
		}
	}else if($datequery == "avgd"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT AVG(TEMP) AS AverageTemp FROM $location WHERE date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($qry_result);
		echo "The average temperature for $startdate to $enddate was $row[AverageTemp]<br />";
	}
	
	
	
	echo "Start date: " .$startdate. " and End Date: " .$enddate. "<br />";
	return;
}else{
	return;
}

$location = $_GET['location'];
$date = $_GET['date'];
$temp = $_GET['temp'];
	// Escape User Input to help prevent SQL Injection
$location = mysql_real_escape_string($location);
$date = mysql_real_escape_string($date);
$temp = mysql_real_escape_string($temp);
	//build query
$query = "SELECT * FROM $location WHERE TEMP >= $temp";
//if(is_numeric($age))
//	$query .= " AND age <= $age";
//if(is_numeric($wpm))
//	$query .= " AND wpm <= $wpm";
	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Location Code</th>";
$display_string .= "<th>Date</th>";
$display_string .= "<th>Temp</th>";
//$display_string .= "<th></th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
// if($query_result == null){
// 	echo "Nothing returned";
// }
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[USAF]</td>";
 	$display_string .= "<td>$row[DATE]</td>";
 	$display_string .= "<td>$row[TEMP]</td>";
// 	$display_string .= "<td>$row[GUS]</td>";
	$display_string .= "</tr>";
	
}
echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;
?>
