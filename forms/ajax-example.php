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

if($queryoption == "max"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT AVG(TEMP) AS AverageTemp FROM $location";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	echo "The averate temperature is $row[AverageTemp]";
	break;
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
