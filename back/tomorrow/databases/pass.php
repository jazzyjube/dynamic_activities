<?php 

use \TANIOS\Airtable\Airtable;

//GET DATA - PASS 
$airtable = new Airtable(array(
    'api_key' => 'key0LItg2WigNuuwe',
    'base'    => 'appZsBeHjfvPFN5yv'
));

//Airtable base specific fields
$tableName = "Planning";
$titleField = 'Session name';
$dateField = "Date";
$locationField = "Location";
$imageField = "Image";


$params = array(
    "filterByFormula" => "IS_SAME({".$dateField."}, '".$tomorrow."' , 'day')",
    "fields" => array ($titleField, $dateField, $imageField, $locationField),
);

$request = $airtable->getContent( $tableName, $params );
$response = $request->getResponse();

if (!empty($response) && !empty($response[ 'records' ])) {

	foreach ($response[ 'records' ] as $key => $value) {

		$title = $value->fields->$titleField;
		$image = $value->fields->$imageField[0]->url;
		$date = $value->fields->$dateField;
		$location = $value->fields->$locationField;

		if (!empty($title) && !empty($image) && !empty($date)) {
			
			array_push($GLOBAL_DATA, array(
					'Title' => $title,
					'Image' => $image,
					'Date' => $date,
					'Location' => $location,
					'Tag' => 'PASS'
		 	));

		}

	}

}
