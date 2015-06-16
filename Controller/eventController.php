<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addeventController
 *
 * @author snandyala
 */
require_once  '../Models/eventModel.php';
require_once  '../Models/usrModel.php';
require_once  '../Models/eventrecipientModel.php';
require_once '../API/Notification.php';
class eventController {
    //put your code here
      public $model; 
      
      public function __construct()    
     {    
          $this->model = new eventModel();  
          
     }
     
     public function AddEvent()
     {
         $patientId=$_SESSION['cpatientId'];
         $userId=$_SESSION['cuserid'];
         
         if($patientId!=null)
         {
             $usrModel= new usrModel();
             $patientDetails= $usrModel->selectById($patientId);
         }
         
         $eventDto=new Event();
         if(isset($_POST['Event']))
         {
             if(isset($_POST['Location']))
             {
                 $location=$_POST['Location'];
             }
             else
             {
                 $location='';
             }
             $startDate=$_POST['StartDate'];
             $startTime=$_POST['StartTime'];
             $sDateTime= $startDate.' '.$startTime;
             $strStartDate=strtotime($sDateTime);
            // $tt= date('H:i:s',$strStartDate); 
             $endDate=$_POST['EndDate'];
             $endTime=$_POST['EndTime'];
             $eDateTime=$endDate.' '.$endTime;
             $strEndDate=strtotime($eDateTime);
             
             $eventDto->title = $_POST['Title'];
             $eventDto->description= $_POST['Description'];
             $eventDto->type_id=15;//$_POST['Type'];
             $eventDto->location=$location;
             $eventDto->start_date=date('Y-m-d',$strStartDate);
             $eventDto->end_date= date('Y-m-d',$strEndDate);
             $eventDto->start_time=date('H:i:s',$strStartDate);  
             $eventDto->end_time= date('H:i:s',$strEndDate);
             $eventDto->crt_dtm=date("Y-m-d H:i:s");
             $eventDto->creator_usr_id=$patientId;
             $eventDto->crt_usr_id=$patientId;
          
             
             //?????????
             $eventDto->priority_id=63;// high
             $eventDto->recurrence_id=55;// no recurrence
             $eventDto->lud_dtm=date("Y-m-d H:i:s");
             $eventDto->lud_usr_id=$patientId;
             $eventDto->isPrivate=1;
             $eventDto->stat_id=48;
             $eventDto->expired_notifi=79;
             $eventDto->visibility_id=53; //private event
             
             $result=$this->model->insertEvent($eventDto);
             
                         
             if($result!=null)
             {
                 $recipients=array();
                 $recipients[]= $userId;
                 $recipients[]= $patientId;
                 $response= $this->AddEventRecipients($result,$recipients,$patientId);
                 $devicetokens[]= $patientDetails->appId;
                 $sendnotification= new Notification();
                 $notify= $sendnotification->push_notification($devicetokens,'Event_Add');
             }
         }
         
     }
     
     public function AddEventRecipients($event_id,$recipients= array(), $CreatedUsrId)
     {
         $eventRecipient =new eventrecipientModel();
         foreach($recipients as $recipient)
         {
             $eventRecipientDto= new EventRecipient();
             $eventRecipientDto->event_id= $event_id;
             $eventRecipientDto-> usr_id = $recipient;
             $eventRecipientDto-> crt_dtm= date("Y-m-d H:i:s");
             $eventRecipientDto->crt_usr_id= $CreatedUsrId;
             $eventRecipientDto->lud_dtm=date("Y-m-d H:i:s");
             $result= $eventRecipient->insertEventRecipient($eventRecipientDto);
         }
         
         return '';
         
     }
     public function GetEventTypes()
     {
         $result= $this->model->selectEventTypes();
         if($result!=null)
         {
             $eventTypes=array();
            
             foreach($result as $res)
             {
                 
                 $event=array();
                 $event['Value']=$res['id'];
                 $event['Title']= $res['title'];
                // $eventTypes=$event;
                 array_push($eventTypes, $event); 
             }
             include '../Views/AddCalEvent.php';
            
         }
     }
     public function GetEvents()
     {
         if(isset($_REQUEST['UserID']))
         {
             $patientId=$_REQUEST['UserID'];
         }
         if($patientId!=null)
         {
              $events=$this->model->selectEvents($patientId);
              $response=$events;// array('events' => $events );
              echo $result = json_encode($events);
              return $result;
         }
       
     }
     
     public function DeleteEvent()
     {
      
         if(isset($_REQUEST['EventID']))
         {
               ob_start();
               $eventId=$_REQUEST['EventID'];
               $result= $this->model->deleteEvents($eventId);
               if($result==true)
               {
                   if(isset($_REQUEST['PatientID']))
                    {
                        $patientID=$_REQUEST['PatientID'];
                        $usrModel= new usrModel();
                        $patientDetails= $usrModel->selectById($patientID);
                        $devicetokens[]= $patientDetails->appId;
                        $sendnotification= new Notification();
                        $notify= $sendnotification->push_notification($devicetokens,'Event_Add');
                    }
                     ob_clean();
                     echo  json_encode(array('status' => 'success' ));
               }
               else
               {
                   echo  json_encode(array('status' => 'Failure' ));
               }
         }
     }
}
