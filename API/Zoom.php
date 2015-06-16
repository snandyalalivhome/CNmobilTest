<?php

require_once(realpath(dirname(__FILE__) . '/../Models/usrModel.php'));
require_once(realpath(dirname(__FILE__) . '/../API/GetProfilePics.php'));
require_once 'Notification.php';





 
class Zoom{
    
    function __construct() {
       
         // $config = parse_ini_file((dirname(__DIR__) . '../config.ini'));  
        $config=parse_ini_file((dirname(dirname(__DIR__))). '/resources/config.ini'); 
         $this->options = array(
             'APIACCESSKEY'=>$config['zoom.api.accesskey'],
             'SECRETKEY'=>$config['zoom.secret.accesskey'],
             'MEETINGAPI'=>$config['zoom.meeting.api']
             );
          
                      
      }
   
 
  /**************************************************************** 
  * Purpose => Login to zoom site using host_id and create meeting*                      *
  * Parameters => $email_id->Email address                        *
  *****************************************************************/  
  public function createZoomCall($user_Detail,$patient_Detail){
       
       $hostId=$user_Detail-> zoomHostID; 
      // $image_url ="http://dev.acarenet.com/webapp/files/user/1106/picture/1106_thumb.jpg";//"http://localhost:8084/files/user/1107/picture/ProfilePic.jpg";
     
      $getprofPic= new GetProfilePics();
      $image_url=$getprofPic->getProfilePicURL($user_Detail->userId);
     // $image_url='';//GetUserProfilePicture($user_Detail->userId, $user_Detail->picture);
       //$src="http://dev.acarenet.com/webapp/files/user/1106/picture/1106_thumb.jpg"
             $data['host_id'] =$user_Detail-> zoomHostID;//'IwjTm5tAQ2SGBT4-P-VEow';
             $data['topic'] ='My testing';
             $data['type'] ='1';
             $request_url=$this->options['MEETINGAPI'];
             $result1= ZoomArrange($data,$request_url,$this->options['APIACCESSKEY'],$this->options['SECRETKEY']);  // meeting id creation
             if(!empty($result1)){
               $second_decode=  json_decode($result1);
               $second_decode=  json_decode($second_decode);
               if(isset($second_decode->id)){      
                   $fullname=$user_Detail->fName.' '. $user_Detail->lName;
                   $extra_message['email_id']=$patient_Detail->emailAddress;
                   $extra_message['host_id']= $user_Detail-> zoomHostID;
                   $extra_message['user_profile_image']=$image_url;//$user_profile_image;
                   $extra_message['from_user_id']=strval($user_Detail->userId);
                   $extra_message['to_user_id']=$patient_Detail->userId;
                   $extra_message['full_name']=$fullname;                       
                   $message=strval($second_decode->id);
                   $devicetokens[]=$patient_Detail->appId;
                   $data['id']=$second_decode->id;  
                   $notify= new Notification();
                   
                   $notificationResponse= $notify->push_notification($devicetokens, $message,$extra_message);//send meeting id
                   if($notificationResponse['http_code'] == '200')
                   {
                       ob_clean();
                       echo $result = json_encode(array('status' => 'success','Location' => $second_decode->start_url ));
                   }
                   else
                   {
                       ob_clean();
                       echo $result = json_encode(array('status' => 'failed','message' => 'Failed To Send Meeting To Client' ));
                   }
                 
                   
               } else {
                   echo $result = json_encode(array('status' => 'failed', 'message' => 'Meeting Id Not Found'));
             
               }
             } else {
                  echo $result = json_encode(array('status' => 'failed', 'message' => 'Meeting Cannot Start'));
                 
             }
         }
    }
   
    
  /**************************************************************** 
  * Purpose => Send request and retrieve response from zoom       *
  *                           using curl method                   *
  * Parameters => $data->request data, $request_url ->Zoom Api url     
  *****************************************************************/
   
    function ZoomArrange($data=array(),$request_url,$apiKey,$secretKey){
         $data['api_key'] =$apiKey;//$this->options['APIACCESSKEY'];
         $data['api_secret'] = $secretKey;//$this->options['SECRETKEY'];      
         $data['data_type'] = 'JSON';    
         $postFields = http_build_query($data);  
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
         curl_setopt($ch, CURLOPT_URL, $request_url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);
         $errorMsg = curl_error($ch);
         curl_close($ch);
         if (!$response) {      
             print_r($response);
                return false;
         }
         return json_encode($response);
   }
    
   
   /*
   function AcaciaApiCall($request_url){
          
         $data = array("AUTHENTICATION_KEY" =>ACACIA_AUTHENTICATION, "COMPANY_ID" => ACACIA_COMPANY_ID,"MEMBERTYPE" => "A" );   
         $data_string=json_encode($data);print_r($data_string);
         
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
         curl_setopt($ch, CURLOPT_URL, $request_url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);
         $errorMsg = curl_error($ch);
         curl_close($ch);
         if (!$response) {      
             print_r($response);
                return false;
         }
         return json_encode($response);
   
   }
  */ 
   
    
   
?>
