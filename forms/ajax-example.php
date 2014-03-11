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
// echo "The query option is " .$queryoption. "<br />";
// $startdate = $_GET['startdate'];
// $startdate = mysql_real_escape_string($startdate);
// $enddate = $_GET['enddate'];
// $enddate = mysql_real_escape_string($enddate);

//average temperature
if($queryoption == "avg"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT AVG(TEMP) AS AverageTemp FROM $location";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	echo "The average temperature is $row[AverageTemp]";
	return;

//maximum temperature
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

//minimum temperature	
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
	
//maximum temperature for the state
}else if($queryoption == "maxstate"){
	$query = "SELECT * FROM Locations";
	$qry_result = mysql_query($query) or die(mysql_error());
// 	$row = mysql_fetch_array($qry_result);
// 	$locationstring = "$row[table_name]";
// 	echo "$locationstring<br />";
// 	while($row = mysql_fetch_array($qry_result)){
// 		$locationstring .= ", $row[table_name]";
// 	}
// 	echo "$locationstring<br />";
	$query = "SELECT MAX(temps.Temperature) as Temperature FROM (";
	$row = mysql_fetch_array($qry_result);
	$query .= "SELECT MAX(TEMP) as Temperature FROM $row[table_name] ";
	while($row = mysql_fetch_array($qry_result)){
		$query .= "UNION ALL SELECT MAX(TEMP) as Temperature FROM $row[table_name] ";
	}
	$query .= ")temps ";
// 	echo "$query<br />";
// 	$query = "SELECT * FROM $locationstring WHERE TEMP = (SELECT MAX(TEMP) FROM $locationstring)";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	//echo "$row[0]<br />";
	//while($row = mysql_fetch_array($qry_result)){
	echo "The highest temperature in the state was $row[Temperature]<br />";
	//}
// 	while($row = mysql_fetch_array($qry_result)){
// 		echo "and $row[DATE]<br />";
// 	}
	return;
	
//minimum temperature for the state
}else if($queryoption == "minstate"){
	$query = "SELECT * FROM Locations";
	$qry_result = mysql_query($query) or die(mysql_error());
	$query = "SELECT MIN(temps.Temperature) as Temperature FROM (";
	$row = mysql_fetch_array($qry_result);
	$query .= "SELECT MIN(TEMP) as Temperature FROM $row[table_name] ";
	while($row = mysql_fetch_array($qry_result)){
		$query .= "UNION ALL SELECT MIN(TEMP) as Temperature FROM $row[table_name] ";
	}
	$query .= ")temps";
// 	echo "$query<br />";
	$qry_result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($qry_result);
	//echo "$row[0]<br />";
	//while($row = mysql_fetch_array($qry_result)){
	echo "The lowest temperature in the state was $row[Temperature]<br />";
	return;
	
//finding days with snow
}else if($queryoption == "snow"){
	$location = $_GET['location'];
	$location = mysql_real_escape_string($location);
	$query = "SELECT USAF, DATE, TEMP, SD FROM $location WHERE SD != 0";
	$qry_result = mysql_query($query) or die(mysql_error());
	
	//determine if any snow days actually exist
	if(mysql_num_rows($qry_result) !== 0){
	//build result table
	echo "Found the following days with recorded snow values:<br />";
		$display_string = "<table>";
		$display_string .= "<tr>";
		$display_string .= "<th>Location Code</th>";
		$display_string .= "<th>Date</th>";
		$display_string .= "<th>Temperature</th>";
		$display_string .= "<th>Snow Depth (in.)</th>";
		$display_string .= "</tr>";
		
		// Insert a new row in the table for each person returned
		while($row = mysql_fetch_array($qry_result)){
			$display_string .= "<tr>";
			$display_string .= "<td>$row[USAF]</td>";
 			$display_string .= "<td>$row[DATE]</td>";
		 	$display_string .= "<td>$row[TEMP]</td>";
 			$display_string .= "<td>$row[SD]</td>";
			$display_string .= "</tr>";
		}
		$display_string .= "</table>";
		echo $display_string;
	}else{
		echo "No days with snow found for this location!<br />";
	}
	return;
	
//this is the start of date-based queries
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
	$enddate = $ende[2] . $ende[0] . $ende[1] . "2359";
	
	$datequery = $_GET['datequery'];
	$datequery = mysql_real_escape_string($datequery);
	if($datequery == "maxd"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT * FROM $location WHERE TEMP = (SELECT MAX(TEMP) FROM $location) AND date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($qry_result);
		echo "The highest temperature for $startdate to $enddate was $row[temp] on $row[date]<br />";
		while($row = mysql_fetch_array($qry_result)){
			echo "and $row[DATE]<br />";
		}
	}else if($datequery == "mind"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT * FROM $location WHERE TEMP = (SELECT MIN(TEMP) FROM $location) AND date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($qry_result);
		echo "The lowest temperature for $startdate to $enddate was $row[temp] on $row[date]<br />";
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
	}else if($datequery == "datedump"){
		$location = $_GET['location'];
		$location = mysql_real_escape_string($location);
		$query = "SELECT * FROM $location WHERE date >= $startdate AND date <= $enddate";
		$qry_result = mysql_query($query) or die(mysql_error());
		
		echo "Here is the information for $location: <br />";
		//build result table
		$display_string = "<table>";
		$display_string .= "<tr>";
		$display_string .= "<th>Location Code</th>";
		$display_string .= "<th>Date</th>";
		$display_string .= "<th>Temperature</th>";
		$display_string .= "<th>Precip. for last hour</th>";
		$display_string .= "<th>Wind Speed (MPH)</th>";
		$display_string .= "<th>Visiblity (Miles)</th>";
		$display_string .= "<th>Snow Depth (in.)</th>";
		//$display_string .= "<th></th>";
		$display_string .= "</tr>";
		
		// Insert a new row in the table for each person returned
		while($row = mysql_fetch_array($qry_result)){
			$display_string .= "<tr>";
			$display_string .= "<td>$row[USAF]</td>";
 			$display_string .= "<td>$row[DATE]</td>";
		 	$display_string .= "<td>$row[TEMP]</td>";
 			$display_string .= "<td>$row[PCP01]</td>";
		 	$display_string .= "<td>$row[SPD]</td>";
		 	$display_string .= "<td>$row[VSB]</td>";
		 	$display_string .= "<td>$row[SD]</td>";
			$display_string .= "</tr>";
		}
		$display_string .= "</table>";
		echo $display_string;
	}
// 	echo "Start date: " .$startdate. " and End Date: " .$enddate. "<br />";
	return;
	
//custom-built, user-specified query options here
}else if($queryoption == "custom"){
	$customsearch = $_GET['customsearch'];
	$location = $_GET['location'];
	
	//searching by temperature
	if($customsearch == "temp"){
		$query = "SELECT * FROM $location WHERE TEMP ";
		
	//finding rainfall amounts for one hour periods
	}else if($customsearch == "rain"){
		$query = "SELECT * FROM $location WHERE PCP01 ";
		
	//finding snowfall amounts
	}else if($customsearch == "snow"){
		$query = "SELECT * FROM $location WHERE SD ";
	
	//finding wind speeds
	}else if($customsearch == "wind"){
		$query = "SELECT * FROM $location WHERE SPD ";
		
	//finding visibilities
	}else if($customsearch == "visb"){
		$query = "SELECT * FROM $location WHERE VSB ";
		
	//fallback for unlikely even a customsearch string isn't submitted
	}else{
		echo "Something broke in submitting your custom search. Please try again later.<br />";
		return;
	}
	
	$maxormin = $_GET['minormax'];
	if($maxormin == "max"){
		$query .= " <= ";
	}else{
		$query .= " >= ";
	}
	
	$customval = $_GET['customval'];
	$customval = mysql_real_escape_string($customval);
	$query .= $customval;
	
	//checking if start date specified
	$startdate = $_GET['startdate'];
	if($startdate != null){
		$startdate = mysql_real_escape_string($startdate);
		echo "Start: " .$startdate. "<br />";
		$starte = explode('/',$startdate);
		$startdate = $starte[2] . $starte[0] . $starte[1] . "0000";
		$query .= " AND date >= $startdate";
	}
	
	$enddate = $_GET['enddate'];
	if($enddate != null){
		$enddate = mysql_real_escape_string($enddate);
		echo "End: " .$enddate. "<br />";
		$ende = explode('/',$enddate);
		$enddate = $ende[2] . $ende[0] . $ende[1] . "2359";
		$query .= " AND date <= $enddate";
	}
	
	echo "$query<br />";
	echo "Here is the information for your custom search for $location: <br />";
	$qry_result = mysql_query($query) or die(mysql_error());
	//build result table
	$display_string = "<table>";
	$display_string .= "<tr>";
	$display_string .= "<th>Location Code</th>";
	$display_string .= "<th>Date</th>";
	$display_string .= "<th>Temperature</th>";
	$display_string .= "<th>Precip. for last hour</th>";
	$display_string .= "<th>Wind Speed (MPH)</th>";
	$display_string .= "<th>Visiblity (Miles)</th>";
	$display_string .= "<th>Snow Depth (in.)</th>";
	//$display_string .= "<th></th>";
	$display_string .= "</tr>";
	
	// Insert a new row in the table for each person returned
	while($row = mysql_fetch_array($qry_result)){
		$display_string .= "<tr>";
		$display_string .= "<td>$row[USAF]</td>";
 		$display_string .= "<td>$row[DATE]</td>";
	 	$display_string .= "<td>$row[TEMP]</td>";
 		$display_string .= "<td>$row[PCP01]</td>";
	 	$display_string .= "<td>$row[SPD]</td>";
	 	$display_string .= "<td>$row[VSB]</td>";
	 	$display_string .= "<td>$row[SD]</td>";
		$display_string .= "</tr>";
	}
	$display_string .= "</table>";
	echo $display_string;
	
}else{
	return;
}

// $location = $_GET['location'];
// $date = $_GET['date'];
// $temp = $_GET['temp'];
// 	// Escape User Input to help prevent SQL Injection
// $location = mysql_real_escape_string($location);
// $date = mysql_real_escape_string($date);
// $temp = mysql_real_escape_string($temp);
// 	//build query
// $query = "SELECT * FROM $location WHERE TEMP >= $temp";
// //if(is_numeric($age))
// //	$query .= " AND age <= $age";
// //if(is_numeric($wpm))
// //	$query .= " AND wpm <= $wpm";
// 	//Execute query
// $qry_result = mysql_query($query) or die(mysql_error());
// 
// 	//Build Result String
// $display_string = "<table>";
// $display_string .= "<tr>";
// $display_string .= "<th>Location Code</th>";
// $display_string .= "<th>Date</th>";
// $display_string .= "<th>Temp</th>";
// //$display_string .= "<th></th>";
// $display_string .= "</tr>";
// 
// // Insert a new row in the table for each person returned
// // if($query_result == null){
// // 	echo "Nothing returned";
// // }
// while($row = mysql_fetch_array($qry_result)){
// 	$display_string .= "<tr>";
// 	$display_string .= "<td>$row[USAF]</td>";
//  	$display_string .= "<td>$row[DATE]</td>";
//  	$display_string .= "<td>$row[TEMP]</td>";
//  	$display_string .= "<td>$row[TEMP]</td>";
// // 	$display_string .= "<td>$row[GUS]</td>";
// 	$display_string .= "</tr>";
// 	
// }
// echo "Query: " . $query . "<br />";
// $display_string .= "</table>";
// echo $display_string;
?>
