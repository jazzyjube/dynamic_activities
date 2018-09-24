<?php 

//Load environment vars
require_once("data/common.php");

//Load custom php functions
require($CLASSES_PATH."Tools.php");

//Load the page specified by the url parameter
$GLOBAL_PAGE = $_GET["page"];
if(empty($GLOBAL_PAGE))
    $GLOBAL_PAGE = $_POST["page"];

$GLOBAL_ACTION = $_GET["action"];
if(empty($GLOBAL_ACTION))
    $GLOBAL_ACTION = $_POST["action"];

if(empty($GLOBAL_PAGE) && empty($GLOBAL_ACTION))
    $GLOBAL_PAGE="home";

//back loading
if(is_file($BACK_PATH."/".$GLOBAL_PAGE.".php"))
               require($BACK_PATH."/".$GLOBAL_PAGE.".php");
elseif(is_dir($BACK_PATH."/".$GLOBAL_PAGE))
        require($BACK_PATH."/".$GLOBAL_PAGE."/".$GLOBAL_PAGE.".php");

//squelette loading
if(is_file($SQUELETTE_PATH."squelette.php"))
        require($SQUELETTE_PATH."squelette.php");
?>