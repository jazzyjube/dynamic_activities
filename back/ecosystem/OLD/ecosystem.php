<?php

ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);


$soapRequest = file_get_contents($BACK_PATH.$GLOBAL_PAGE."/request/searchReservation.xml", true);
$wsdl = 'https://portal.mymcslogin.com/thecamp_p/connect/?soap:reservations:v1&describe';

$options = array(
		'uri'=>'http://schemas.xmlsoap.org/soap/envelope/',
		'style'=>SOAP_RPC,
		'use'=>SOAP_ENCODED,
		'soap_version'=>SOAP_1_2,
		'cache_wsdl'=>WSDL_CACHE_NONE,
		'connection_timeout'=>15,
		'trace'=>true,
		'encoding'=>'UTF-8',
		'exceptions'=>true,
	);
try {
	
	$soap = new SoapClient($wsdl, $options);
	$data = $soap->searchReservations($soapRequest);
}
catch(Exception $e) {
	die($e->getMessage());
}
  
var_dump($data, "LOL");
die;