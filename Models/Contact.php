<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author snandyala
 */
class Contact {
    //put your code here
    public $userId;
    public $relatedUsrId;
    public $role ;
    public $fName;
    public $lName;
    public $emailAddr;
    public $phone;
    
    public function __construct($userId,$relatedUsrId, $role, $fName,$lName,$emailAddr,$phone)    
    {    
        $this->userId = $userId;  
        $this->relatedUsrId = $relatedUsrId;  
        $this->role =$role;  
        $this->fName = $fName;  
        $this->lName = $lName;  
        $this->emailAddr = $emailAddr;  
        $this->phone = $phone;  
       
    } 
  
}
