<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profileController
 *
 * @author snandyala
 */
require_once '../Models/usrModel.php';
require_once '../Models/profilefieldsModel.php';
require_once '../Models/profilevaluesModel.php';
require_once 'loginController.php';
class profileController {
    //put your code here
     public $model; 
    // public $selfinstantiate= new loginController();
    public function __construct()    
    {    
        $this->model = new usrModel();    
    }
    public function editProfile()  
    { 
        
         if(!isset($_SESSION['cuserid'])) 
        { 
            header("Location: ../Views/login.php");
            exit; 
        }
        
        if(isset($_POST['gender']))
        {
            $gender=$_POST['gender'];
        }
        else
        {
             $gender='';
        }
         if(isset($_POST['timeZone']))
        {
            $timeZone=$_POST['timeZone'];
        }
        else
        {
            $timeZone='';
        }
        // update user table with timezone
        
        $result= $this->model->updateTimeZone($_SESSION['cuserid'],$timeZone);
        
        //update profile table with gender
        
        $profileFieldId= $this->getProfileFields('Gender');
         if($profileFieldId !=null)
         {
             // insert/ update profile field values table
             ob_start();
             $insupdnewval= $this->insertUpdateProfileValues($profileFieldId, $_SESSION['cuserid'], $gender);
             ob_clean();
             if($insupdnewval)
             {
                  // redirect to landing page
                   
                $loginctrl= new loginController();
                $loginctrl->prepareLandingPage();
             }
             
         }
         
    }
        public function insertUpdateProfileValues($fieldId, $userId,$value){
        $profileValues =new profilevaluesModel();
        $existingValues= $profileValues->getProfileValues($userId,$fieldId);
       // if(array_key_exists($fieldId, $existingValues))
        if($existingValues!=null)
        {
            //update
            $updatenewvalue= $profileValues->updateProfileValue($fieldId,$value,$userId);
            return $updatenewvalue;
            
        }
        else
        {
            //insert
            $profValDTO= new ProfileValues();
            $profValDTO->field_id=$fieldId;
            $profValDTO->security_id=28;
            $profValDTO->usr_id=$userId;
            $profValDTO->value=$value;
            $profValDTO->crt_dtm=date("Y-m-d H:i:s");
            $profValDTO->lud_dtm=date("Y-m-d H:i:s");;
            $profValDTO->lud_usr_id=$userId;
            $insertnewvalue=$profileValues->insertProfileValue($profValDTO);
            if($insertnewvalue == 0)
            {
                return true;
            }
            else
                return false;
        }
    }
    function getProfileFields($title)
    {
        $profileField =new profilefieldsModel();
        $result= $profileField->selectByTitle($title);
        return $result['id'];
    }
    
    function getExistingProfile()
    {
        //get gender
         $profileFieldId= $this->getProfileFields('Gender');
         if($profileFieldId !=null)
         {
               $existingValues= $profileValues->getProfileValues($_SESSION['cuserid'],$profileFieldId);
                if($existingValues!=null)
                {
                    $gender= $existingValues['value'];
                }
                else
                {
                    $gender='';
                }
         }
        //get timezone
         $result= $this->model->selectById($userId);
          $timeZone= $result['timezone'];
          $retarray=array('Gender'=> $gender, 'TimeZone'=>$timeZone);
        return $retarray;
    }
  
    
//    //echo json_encode(array('timezones'=>$timeZoneList));
//    function timeZones()
//    {
//            $timeZones = DateTimeZone::listIdentifiers();
//            $ret =array();
//            foreach ( $timeZones as $timeZone ) 
//                    $ret[$timeZone] = $timeZone;
//                // $ret[] = $timeZone;
//
//            return $ret;
//    }
}
