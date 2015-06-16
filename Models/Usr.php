<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author snandyala
 */
class Usr {
    //put your code here
 
    public $userId;
    public $screenName ;
    public $password;
    public $fName;
    public $lName;
    public $deviceId;
    public $appId;
    public $zoomHostID;
    public $emailAddress;
    public $confirm;
    public $timeZone;
    public $picture;


    public function __construct($userId,$screenName, $password, $fName,$lName,$deviceId,$appId,$zoomHostID,$emailAddress,$confirm,$timeZone,$picture)    
    {    
        $this->userId = $userId;  
        $this->screenName = $screenName;  
        $this->password = $password;  
        $this->fName = $fName;  
        $this->lName = $lName;  
        $this->deviceId = $deviceId;  
        $this->appId = $appId;  
        $this->zoomHostID = $zoomHostID;  
        $this->emailAddress=$emailAddress;
        $this->confirm=$confirm;
        $this->timeZone= $timeZone;
        $this->picture= $picture;
    } 
        
}
   
    
?>
