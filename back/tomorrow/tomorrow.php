<?php 

include($LIBRAIRIE_PATH.'airtable/Airtable.php');
include($LIBRAIRIE_PATH.'airtable/Request.php');
include($LIBRAIRIE_PATH.'airtable/Response.php');

//language definition
$language = $_GET[ 'lang' ];

if(!empty($language)) {
    $language = strtoupper($language);
}

//switch to fr if lang parameter is not defined
if(empty($language) || ($language != "FR" && $language != "EN")) {
    $language = "FR";
}

$tomorrow = date("Y-m-d", strtotime('tomorrow'));


$GLOBAL_DATA = array();

include($BACK_PATH.$GLOBAL_PAGE."/databases/activities.php");
include($BACK_PATH.$GLOBAL_PAGE."/databases/events.php");
include($BACK_PATH.$GLOBAL_PAGE."/databases/pass.php");


//order item by date 
function sortFunction( $a, $b ) {
    return strtotime($a["Date"]) - strtotime($b["Date"]);
}

usort($GLOBAL_DATA, "sortFunction");

//Max 9 items to display
$GLOBAL_DATA = array_slice($GLOBAL_DATA, 0, 9);

//prepare time for display
foreach ($GLOBAL_DATA as $key => $value) {
	$date = strtotime($value["Date"]);
	$GLOBAL_DATA[$key]["Date"] = date('H', $date).":".date('i', $date);
}
