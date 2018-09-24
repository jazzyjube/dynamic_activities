<?PHP

/*
#########################
# Mode Debug avec Trace #
#########################
*/
define("DEBUG_MODE",true);

define ("MODE_PRODUCTION" , 1);
define ("MODE_DEV_1" , 2);
define ("MODE_DEV_2" , 3);

if(startswith(curPageURL(),"http://localhost:8888/"))
        define('CURRENT_MODE',MODE_DEV_1);
else if(startswith(curPageURL(),"http://localhost/"))
        define('CURRENT_MODE',MODE_DEV_2);	
else {
        define('CURRENT_MODE',MODE_PRODUCTION);	
}

/*
###########################
# Répertoires /extensions #
###########################
*/
if(CURRENT_MODE == MODE_PRODUCTION) {
       
   $DOMAIN_NAME="http://www.kiwiride.com/";
   $GENERAL_PATH="/homepages/37/d677888557/htdocs/";
        
} else if(CURRENT_MODE == MODE_DEV_1) {

	error_reporting(E_ALL);
	ini_set('display_errors', '0');	

    $DOMAIN_NAME="http://localhost:8888/dynamic_screens/";
    $GENERAL_PATH="/Applications/MAMP/htdocs/dynamic_screens/";

} else if(CURRENT_MODE == MODE_DEV_2) {
	error_reporting(E_ALL);
	ini_set('display_errors', '0');

    $DOMAIN_NAME="http://localhost/dynamic_screens/";
    $GENERAL_PATH="C:\wamp64\www\dynamic_screens/";
}

date_default_timezone_set('UTC');

$GENERAL_PATH_LOG= $GENERAL_PATH."logs/";
$GENERAL_PATH_TMP_UPLOAD=$GENERAL_PATH."tmpFiles/";
$GENERAL_URL=$DOMAIN_NAME;

$DATA_PATH=$GENERAL_PATH."data/";
$SQUELETTE_PATH=$GENERAL_PATH."squelette/";

$FRONT_PAGES_PATH=$GENERAL_PATH."front/pages/";
$FRONT_RESSOURCES_PATH=$GENERAL_PATH."front/ressources/";
$FRONT_PAGES_URL=$GENERAL_URL."front/pages/";
$FRONT_RESSOURCES_URL=$GENERAL_URL."front/ressources/";

$LOGS_PATH=$GENERAL_PATH."logs/";
$BACK_PATH=$GENERAL_PATH."back/";
$LIBRAIRIE_PATH=$GENERAL_PATH."lib/";
$CLASSES_PATH=$LIBRAIRIE_PATH."classes/";

$FONT_PATH = $FRONT_RESSOURCES_PATH."font/";
$CSS_PATH=$FRONT_RESSOURCES_PATH."css/";
$JS_PATH=$FRONT_RESSOURCES_PATH."js/";
$FONT_URL = $FRONT_RESSOURCES_URL."font/";
$CSS_URL=$FRONT_RESSOURCES_URL."css/";
$JS_URL=$FRONT_RESSOURCES_URL."js/";

$IMAGE_PATH = $FRONT_RESSOURCES_PATH."img/";
$FRONT_URL = $GENERAL_URL."front/";
$BACK_URL = $GENERAL_URL."back/";
$IMAGE_URL = $FRONT_URL."img/";

$GENERAL_PAGE_URL = $GENERAL_URL."index.php?page=";

$MAIN_PAGE="home";


function curPageURL() {
	$pageURL = 'http';
	if (@$_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if(isset($_SERVER["SERVER_PORT"]) && isset($_SERVER["SERVER_PORT"])) {
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}	
	}
	return $pageURL;
}

function startswith($hay, $needle) {
  return substr($hay, 0, strlen($needle)) === $needle;
}

?>
