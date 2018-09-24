<?php



if(isset($_GET["arbrevirtuel"])){ 
    $imagesDir = "/images_arbre/";
}else{
    $imagesDir = "/images/";
}


$dirs = array_filter(glob($FRONT_PAGES_PATH.$GLOBAL_PAGE.$imagesDir."*"), 'is_dir');


include ($BACK_PATH.$GLOBAL_PAGE."/folderlink.php");


$GLOBAL_DATA = array ();

foreach($dirs as $key => $folder) {
        
        $GLOBAL_DATA [$key]["path"] = $folder;

        foreach ($DATA_ORDER as $key2 => $item){
                
                if(strpos($folder, trim($key2))){
                        
                        $GLOBAL_DATA [$key]["title"] = $item;
                        
                        $images =  scandir($folder);

                        if ($images){

                                    unset($images[0]);
                                    unset($images[1]);
                                    unset($images[2]);
                                    $GLOBAL_DATA[$key]['images'] = array();

                                foreach ($images as  $item){
                                        array_push($GLOBAL_DATA[$key]['images'], trim($FRONT_PAGES_URL.$GLOBAL_PAGE.$imagesDir.$key2."/".$item));
                                }
                        }        
                }             
        }       
}

//die(var_dump($GLOBAL_DATA));