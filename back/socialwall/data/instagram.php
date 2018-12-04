<?php


	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

 	 $tag = 'creativeconnections';
    $client_id = "feb11f277ec749729a1c920360f862c8";
    $redirect = $GENERAL_PAGE_URL.$GLOBAL_PAGE;

    $url1 = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

    $url = 'https://api.instagram.com/oauth/authorize/?client_id='.$client_id.'&redirect_uri='.$redirect.'&response_type=code';
	$url = "https://www.instagram.com/explore/tags/".$tag."/?__a=1";

 	$ch = curl_init();
		
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));
 
   $result = curl_exec($ch);
   $json = json_decode($result);
   echo $result;
die (var_dump());

   curl_close($ch);
