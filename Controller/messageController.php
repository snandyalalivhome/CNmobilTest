<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of messageController
 *
 * @author glopez
 */
include_once '../Models/messageModel.php';
require_once  '../Models/messagerecipientModel.php';
require_once  '../Models/usrModel.php';
require_once '../API/Notification.php';

class messageController {
    public $model; 
    public function __construct()    
    {    
          $this->model = new messageModel();  
          
          
    }
    
    public function sendMessage()  
    {  
        $subject = $_POST['subject'];
        $content =$_POST['content']; 
        
        $result = $this->model ->insert($_SESSION['cuserid'], $subject, $content); 
        if($result!=null)
        {
            $msgRecipientModel= new messagerecipientModel();
            //date_default_timezone_set("America/Los_Angeles");
           // $time= date("Y-m-d H:i:s", time()); 
           // $dt= date("Y-m-d H:i:s");
            $msgRecipientDTo =new message_recipient($_SESSION['cpatientId'], $result, 15, date("Y-m-d H:i:s"), $_SESSION['cuserid'], date("Y-m-d H:i:s"), $_SESSION['cuserid']);

            $result= $msgRecipientModel->insertMsgRecipient($msgRecipientDTo);
            if($result)
            {
                ob_start();
                $usermodel= new usrModel();
                $patientDetails=$usermodel-> selectById($_SESSION['cpatientId']);
                $devicetokens[]= $patientDetails->appId;
                $sendnotification= new Notification();
                $notify= $sendnotification->push_notification($devicetokens,'Message');
                ob_clean();
                echo  json_encode(array('status' => 'success' ));
            }
        }
    }
}
