<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification
 *
 * @author snandyala
 */
class Notification {
    //put your code here
      function __construct() {
           // $config = parse_ini_file((dirname(__DIR__) . '../config.ini'));  
            $config=parse_ini_file((dirname(dirname(__DIR__))). '/resources/config.ini'); 
            $this-> APPKEY= $config['urbanairship.appkey'];
            $this-> PUSHSECRET= $config['urbanairship.pushsecret'];
            $this->push_url =$config['urbanairship.push.api'];
      }
       function push_notification($devicetokens,$alert,$extra=array()){      
          if(!empty($devicetokens)) {              
             $contents = array(); 
             $contents['alert'] = $alert;   
             $notification=array();
             if(!empty($extra)){
                 $contents['extra'] = $extra;   
             }
             
             $push = array("apids" => $devicetokens,"android" => $contents); 	        
             $push_url =$this->push_url;
             $json = json_encode($push);
             $session = curl_init($push_url); 
             curl_setopt($session, CURLOPT_USERPWD,  $this-> APPKEY . ':' . $this-> PUSHSECRET); 
             curl_setopt($session, CURLOPT_POST, True);
             curl_setopt($session, CURLOPT_POSTFIELDS, $json);
             curl_setopt($session, CURLOPT_HEADER, False);
             curl_setopt($session, CURLOPT_RETURNTRANSFER, True);
             curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
             curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
             $content = curl_exec($session); 
               
             // Check if any error occured 
               $errorMsg = curl_error($session); print_r($errorMsg);        
                        
             $response = curl_getinfo($session);   
             
           return $response;
                             
            
          }
       }
}
