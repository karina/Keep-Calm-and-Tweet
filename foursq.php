<?php
	
	echo "What city and state? \n";
	$loc = fgets(STDIN);
	echo "What is the radius in meters? \n";
	$radius = fgets(STDIN);
	$base_url = "https://api.foursquare.com/v2/venues/search?";
	
	$client_key ="40EO1PPFTB2PTMSVCKQSLFTA2EKVCDFDZRRA25SJCQ0A2JZ3";
	$client_secret = "P1JXLNQCLRGJIWHB2STS2S2ZNPIGVARLB4LR5RFKYVZGPDPF";
	$version = "20120228";

	$payload = array(
		'near'=>$loc,
		'radius'=>$radius,
		'query'=>"Starbucks",
		'client_id'=>$client_key,
		'client_secret'=>$client_secret,
		'v'=>$version
	);

	$url = $base_url . http_build_query($payload);

	
 	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response_body = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	
	$jresponse = json_decode($response_body);
	$count = 0;

	foreach($jresponse->response->venues as $result){
		if(stristr($result->name, 'Starbucks') != false){
			$count++;
		}
	}

	echo "Starbucks in your area: " . $count . "\n";

?>
