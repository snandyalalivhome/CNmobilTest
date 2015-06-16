<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landingpageController
 *
 * @author snandyala
 */
require_once  '../Models/ContactModel.php';
require_once '../Models/usrModel.php';
require_once '../API/Zoom.php';
require_once 'photogalleryController.php';

class landingpageController {
    //put your code here
      public $model; 
      
      public function __construct()    
     {    
          $this->model = new ContactModel();  
          
     }
      public function select()  
     { 
          $query= "SELECT id, fname, lname, email_addr,phone, homebridge.hb_t_usr_network.* FROM hb_t_usr_network inner join hb_t_usr on id = usr_id where related_usr_id='".$_SESSION['cuserid']."'";
          $rows = $this->model -> select($query);   
          if(count($rows)!=0)
          {
             
                $fstPatient=$rows[0];
                $_SESSION['cpatientId']=$fstPatient->userId;
                $_SESSION['cpatientName']=$fstPatient->fName.' '. $fstPatient->lName;
                $_REQUEST['action']='Landing';
                include '../Views/Landing_Page.php';
          }
          else
          {
              $fstPatient='NoData';
              include '../Views/noCareNEtworkContacts.php';
          }
     }
     
      public function selectPatientDetails()  
     { 
          $query= "SELECT id, fname, lname, email_addr,phone, homebridge.hb_t_usr_network.* FROM hb_t_usr_network inner join hb_t_usr on id = usr_id where related_usr_id='".$_SESSION['cuserid']."'";
          $rows = $this->model -> select($query);   
          if(count($rows)!=0)
          {
             
                $fstPatient=$rows[0];
                $_SESSION['cpatientId']=$fstPatient->userId;
                
          }
          else
          {
              $fstPatient='NoData';
              $_SESSION['cpatientId']='0';
             
          }
          return $fstPatient;
         
     }
   
      public function zoomCall()  
     {
           ob_start();
          if(isset($_POST['patientID']) &&isset($_POST['userID']) )
          {
             $patientId=$_POST['patientID'];
             $userId=$_POST['userID'];
             $userModel= new UsrModel(); 
            $userDetails=   $userModel ->selectById($userId);   
            $patientDetails=$userModel ->selectById($patientId); 
          }
         
         $zoomcall= new Zoom();
         $zoomcall->createZoomCall($userDetails, $patientDetails);
     }
     public function photoGallery()
     {
          if(isset($_POST['patientID']) &&isset($_POST['userID']) )
          {
             $patientId=$_POST['patientID'];
             $userId=$_POST['userID'];
             $userModel= new UsrModel(); 
            $userDetails=   $userModel ->selectById($userId);   
            $patientDetails=$userModel ->selectById($patientId); 
          }
         //$upload_handler = new UploadHandler();
         // $customerID = $_SESSION['cuserid'];
          //$_SESSION['cuserid'] = $userDetails->userId; 
            //       $_SESSION['cauthToken'] =sha1($userDetails->emailAddress);
                 //  $photogallery = new photogalleryController();
                 // $photogallery->get(TRUE);
          
         //  $_REQUEST['action']='CreateBucket';
           //include'routing.php';
                 //$Patient= $patientDetails->userId;
                 // include '../Views/Photo_Gallery.php'; 
          
     }
     public function uploadPics()
     {
          if(isset($_POST['patientID']) &&isset($_POST['userID']) )
          {
             $patientId=$_POST['patientID'];
             $userId=$_POST['userID'];
             $userModel= new UsrModel(); 
            $userDetailsc=   $userModel ->selectById($userId);   
            $patientDetails=$userModel ->selectById($patientId); 
          }
          // $_SESSION['authToken'] =sha1($_POST['userID']);// need to delete 
//           include '../Views/Upload_Pics.php'; 
       //    echo $result = json_encode(array('status' => 'success','Location' => '../Views/Upload_Pics.php' ));
           // header('Location: ../Views/Upload_Pics.php'); ;
     }
}
