<?php

header('Content-type: application/json');

error_reporting(-1);

class result
{
}

$query = "";
if (isset($_GET['q']))
{
	$query = $_GET['q'];
}

//this is the production api key
$url = 'https://secure.oregonstate.edu/is-tools/reftool/api/search/' . rawurlencode($query) . '?api_key=5e0ffa9ca356bc8b01c6d32673cfeb0807dd4d69';

$result = file_get_contents($url);

$resultraw = json_decode($result);

$emails = array();

$count = 0;

foreach($resultraw as $result)
{
	if (isset($result->{'mail'}))
	{
		$return = new result;
		$return->{'id'} = $count++;
		$return->{'mail'} = $result->{'mail'};
		$return->{'name'} = $result->{'displayname'};
		$return->{'dept'} = $result->{'department'};
		array_push($emails, $return);
	}
}

$raw = array( "query" => $query ,
			  "results" => $emails);

echo json_encode($raw);

?>