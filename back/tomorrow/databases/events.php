<?php 

use \TANIOS\Airtable\Airtable;

//GET DATA - Events  
$airtable = new Airtable(array(
    'api_key' => 'key0LItg2WigNuuwe',
    'base'    => 'apphjU1LF4u3C2wH8'
));

//Airtable base specific fields
$tableName = "Planning";
$titleField = 'Title';
$dateField = "Date start";
$locationField = "Location";
$imageField = "Picture";

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
					'Tag' => 'Event'
		 	));

		}

	}

}