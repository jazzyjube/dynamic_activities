<?php 

use \TANIOS\Airtable\Airtable;

//GET DATA - Activities 
$airtable = new Airtable(array(
    'api_key' => 'key0LItg2WigNuuwe',
    'base'    => 'apptyvV2tZRsLO6Mn'
));

//Airtable base specific fields
$tableName = "Groups";
$titleField = "Name";
$dateField = "Date";

//Date request 
$date_request = date('m-d-Y', strtotime('monday this week'));

//Date for today badge 
$today = date('Y-m-d', strtotime('today'));

$weekStart = date('d.m.Y', strtotime('monday this week'));
$weekEnd = date('d.m.Y', strtotime('sunday this week'));

$GLOBAL_DATA = array();
$GLOBAL_DATE = array(
	"weekStart" => $weekStart,
	"weekEnd" => $weekEnd,
	);


$params = array(
    "filterByFormula" => "OR(IS_SAME({".$dateField."}, '".$date_request."' , 'day'), IS_AFTER({".$dateField."}, '".$date_request."' , 'day'))",
    "fields" => array ($titleField, $dateField),
    "view" => "Grid view",
    "sort" => array (array ("field" => $dateField))
);

$request = $airtable->getContent( $tableName, $params );
$response = $request->getResponse();


if (!empty($response) && !empty($response[ 'records' ])) {

	foreach ($response[ 'records' ] as $key => $value) {

		$title = $value->fields->$titleField;
		$date = $value->fields->$dateField;
		$found = 0;

		if (!empty($title)) {
			
			foreach ($GLOBAL_DATA as $key => $data) {
				if($data["title"] == $title){
					array_push($data["date"], $date);
					$GLOBAL_DATA[$key]["date"] = $data["date"];
					$found = 1;
				}
			}

			if(!$found){
				array_push($GLOBAL_DATA, array(
					'title' => $title,
					'date' => array($date),
		 		));
			}

		}

	}

}
