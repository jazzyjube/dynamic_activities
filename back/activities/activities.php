<?php


$GLOBAL_DATA = array();

include($BACK_PATH.$GLOBAL_PAGE."/translate.php");
include($BACK_PATH.$GLOBAL_PAGE."/databases/activities.php");
include($BACK_PATH.$GLOBAL_PAGE."/databases/events.php");

//Redirect to outthere view if no data
if (empty($GLOBAL_DATA["events"]) && empty($GLOBAL_DATA["experiences"])){
    header('Location: '. $GENERAL_PAGE_URL."outthere");
}
