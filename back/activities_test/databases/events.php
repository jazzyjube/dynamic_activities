<?php 

$json = file_get_contents($eventsUrl);
$obj = json_decode($json);

if(!empty($obj)){
	$GLOBAL_DATA["events"] = array_slice($obj, 0, 3);
}
foreach ($GLOBAL_DATA["events"] as $key => $value) {
	if(!empty($value->event_date_range)){
		$date = str_replace( array('<span class="date-display-range">', '</span>', 2018, 2019, 2020, 2021, 2100 ), "", $value->event_date_range);
		$value->event_date_range = $date;
	}
}
