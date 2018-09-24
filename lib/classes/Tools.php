<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tools
 *
 * @author julienb
 */

class Tools {
     
        
        static function redirectToUrl ($url){

                while (ob_get_status()) 
                {
                    ob_end_clean();
                }

                header( "Location: $url" );
        }
        
}
