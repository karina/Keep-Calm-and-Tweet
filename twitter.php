<?php

$object = json_decode(file_get_contents("http://search.twitter.com/search.json?q=%23keepcalmand&rpp=50"));

$array = array();
foreach($object->results as $tweet){
	$tweet->text = strtoupper($tweet->text);
	if(strstr(substr($tweet->text,0,2),'RT') != false){
		continue;
	}
	else{
		
		$text = strstr($tweet->text, 'KEEPCALMAND');
		$text = substr($text, 12);
		if(strstr(substr($text,0,2),'HT') != false){
			continue;
		}
		else{
			for($i = 0; $i < strlen($text); $i++){
				if($text[$i] == '#' || $text[$i] == '.' || $text[$i] == '!' || $text[$i] == '?' || $text[$i] == '@' || $text[$i] == '(' || ($text[$i] == 'H' && $text[$i+1] == 'T')){
					$text = substr($text,0,-(strlen($text) - $i));
					break;
				}
			}
		}
		$text = rtrim($text);
		if($text != "")
			array_push($array, $text);
	}
}

?>

