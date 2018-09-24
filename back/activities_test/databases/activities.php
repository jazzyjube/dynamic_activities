<?php 

include($LIBRAIRIE_PATH.'airtable/Airtable.php');
include($LIBRAIRIE_PATH.'airtable/Request.php');
include($LIBRAIRIE_PATH.'airtable/Response.php');

use \TANIOS\Airtable\Airtable;


//GET DATA - Activities 
$airtable = new Airtable(array(
    'api_key' => 'key0LItg2WigNuuwe',
    'base'    => 'appSuR2Fm8F98nmoZ'
));

//Airtable base specific fields
$tableName = "Planning sessions";
$titleField = 'Session name' . " - " . $language;
$locationField = 'Lieu';
$pictureField =  'Image';
$descriptionField = 'Short description' . " - " . $language;
$dateField = 'Date 1';


//Date for today badge 
$yesterday = date('Y-m-d', strtotime('yesterday'));

$GLOBAL_DATA = array();
$GLOBAL_DATA["experiences"] = array();
$params = array(
    "fields" => array ($titleField, $dateField, $locationField, $pictureField, $descriptionField),
    "view" => "FR - Affichage dynamique",
    "sort" => array (array ("field" => $dateField)),
    "maxRecords" => 5,
);

$request = $airtable->getContent( $tableName, $params );
$response = $request->getResponse();

if (!empty($response) && !empty($response[ 'records' ])) {

	foreach ($response[ 'records' ] as $key => $value) {

		$title = $value->fields->$titleField;
		$description = $value->fields->$descriptionField;
		$location = $value->fields->$locationField;
		$picture = $value->fields->$pictureField[0]->url;

		$date = $value->fields->$dateField;
		$newDate = strftime("%d %B", strtotime($date));	
		$time = strftime("%H:%M", strtotime($date));	

		if (!empty($title[0])) {
			
			array_push($GLOBAL_DATA["experiences"], array(
					'title' => $title[0],
					'description' => $description[0],
					'location' => $location,
					'picture' => $picture,					
					'date' => $newDate,
					'time' => $time,

		 		));
		
		}

	}

}
