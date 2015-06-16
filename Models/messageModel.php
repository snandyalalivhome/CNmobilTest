<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of messageModel
 *
 * @author glopez
 */

/* api call example
$data = array("name" => "Hagrid", "age" => "36");                                                                    
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('http://api.local/rest/users');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
 
$result = curl_exec($ch);
*/

include_once 'DbConnection.php';
include_once 'message.php';

class messageModel extends DbConnection {
    
        public function insert($userId, $subject, $content) { 
            
            $now = date("Y-m-d H:i:s");
            
            $query="INSERT INTO hb_t_message (is_not_event, stat_id, type_id, sender_usr_id, subject, content, crt_dtm, crt_usr_id)
                    VALUES('1','12','51','". $userId."','". $subject."','". $content."','". $now."','". $userId."')"; 
            
            $result= $this->insertQuery($query);
            
           // $result = $this -> query($query); 
            
            
            
            /*
            $model=new message(); 

            $now = date("Y-m-d H:i:s");
 
            $model->is_not_event = 1;  
            $model->stat_id = 12;  
            $model->type_id = 51;  
            $model->sender_usr_id = $userid;  
            $model->subject = $subject;  
            $model->content = $content;  
            $model->crt_dtm= $now;
            $model->crt_usr_id=$userid;
            $model->lud_dtm=$now;
            $model->lud_usr_id=$userid;
            
            $result = $model->save();
            */
            
            if($result === NULL) { 
                return null; 
            } 
               
            return $result; 
    } 
    
 

}
