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

	$eventsUrl = "https://thecamp.fr/fr/api/events?_format=json";

	$vertical_text1 = "EXPÉRIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPÉRIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPÉRIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPÉRIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	$vertical_text2 = "ÉVÉNEMENTS &nbsp;&nbsp;&nbsp;
			ÉVÉNEMENTS &nbsp;&nbsp;&nbsp;
			ÉVÉNEMENTS &nbsp;&nbsp;&nbsp;
			ÉVÉNEMENTS &nbsp;&nbsp;&nbsp;";


	$upcoming_text_experience = "PROCHAINES EXPÉRIENCES";
	$upcoming_text_event = "PROCHAINS ÉVÉNEMENTS";
	$todayLabel = "AUJOURD'HUI";

	setlocale(LC_TIME, "fr_FR");
	$today = strftime("%d %B", strtotime("today"));

if ($language != "FR"){

	$eventsUrl = "https://thecamp.fr/api/events?_format=json";

	$todayLabel = "TODAY";

	$vertical_text1 = "EXPERIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPERIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPERIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			EXPERIENCES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	$vertical_text2 = "EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;
			EVENTS &nbsp;&nbsp;&nbsp;";

	$upcoming_text_experience = "UPCOMING EXPERIENCES";
	$upcoming_text_event = "UPCOMING EVENTS";

}