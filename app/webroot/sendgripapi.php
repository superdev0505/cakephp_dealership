<?php
//unsubscribes - http://localhost/sendgripapi.php?type=unsubscribes
// bounces - http://localhost/sendgripapi.php?type=bounces
$module = $_GET['type'];
if($module!=''){
	$url = 'https://api.sendgrid.com/api';
	$user = 'tkilgore';
	$pass = '4756ty3663TK';
	$request =  $url."/$module.get.json?api_user=$user&api_key=$pass&date=1";

	$response = file_get_contents($request);

	$response = json_decode($response);
	echo "<pre>";
	print_r($response);
	die;
}
?>