<?php 


//language definition
$language = $_GET[ 'lang' ];

if(!empty($language)) {
    $language = strtoupper($language);
}

//switch to fr if lang parameter is not defined
if(empty($language) || ($language != "FR" && $language != "EN")) {
    $language = "FR";
}

$title1 = "Écosystème";
$title2 = "NOUS SUIVRE";
$todayLabel = "AUJOURD'HUI";


if ($language != "FR"){
	$title1 = "Ecosystem";
	$title2 = "CONNECT WITH US";
	$todayLabel = "TODAY";
}