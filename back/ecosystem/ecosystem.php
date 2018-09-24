<?php 

include($LIBRAIRIE_PATH.'airtable/Airtable.php');
include($LIBRAIRIE_PATH.'airtable/Request.php');
include($LIBRAIRIE_PATH.'airtable/Response.php');


$weekStart = date('d.m.Y', strtotime('monday this week'));
$weekEnd = date('d.m.Y', strtotime('sunday this week'));

$GLOBAL_DATA = array();

include($BACK_PATH.$GLOBAL_PAGE."/translate.php");
include($BACK_PATH.$GLOBAL_PAGE."/databases/ecosystem.php");