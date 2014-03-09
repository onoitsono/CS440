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
$age = $_GET['age'];
$sex = $_GET['sex'];
$wpm = $_GET['wpm'];
	// Escape User Input to help prevent SQL Injection
$age = mysql_real_escape_string($age);
$sex = mysql_real_escape_string($sex);
$wpm = mysql_real_escape_string($wpm);
	//build query
$query = "SELECT * FROM pdxdata WHERE DIR = 100";
//if(is_numeric($age))
//	$query .= " AND age <= $age";
//if(is_numeric($wpm))
//	$query .= " AND wpm <= $wpm";
	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Date</th>";
$display_string .= "<th>Sex</th>";
$display_string .= "<th>WPM</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
if($query_result == null){
	echo "Nothing returned";
}
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row</td>";
 	$display_string .= "<td>$row[DIR]</td>";
// 	$display_string .= "<td>$row[SPD]</td>";
// 	$display_string .= "<td>$row[GUS]</td>";
	$display_string .= "</tr>";
	
}
echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;
?>
