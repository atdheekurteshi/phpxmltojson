<?php

/*** References ***
 *
 *https://www.phpmanual.com/
 *https://www.google.com
 *
 */ 

/**
 *$handel variable the opens the json file
 *$url variable that loads the xml file.
 *
 */ 

header('Content-Type: application/json');
$handel=fopen("kurteshi_tv_program.json", 'w');

$url=simplexml_load_file("kurteshi_tv_Program.xml");

//$json=array();
//$json =[json_encode($url,JSON_PRETTY_PRINT)];

/*here i am encoding the xml that it have been return from simplexml_load_file function to $ur variable*/

$json =json_encode($url,JSON_PRETTY_PRINT);

/*herer i am writen to the file that i have created the $json content*/

$fwrite=fwrite($handel, $json);
if(!$fwrite){
	echo "Something went wrong...\n";
	
}
else {

	echo "Data hase been successfully written to the file...\n";
	echo  $json;
}

?>

