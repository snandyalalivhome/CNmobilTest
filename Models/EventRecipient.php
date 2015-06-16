<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventRecipients
 *
 * @author snandyala
 */
class EventRecipient {
    //put your code here
    public $event_id;
    public $usr_id;
    public $crt_dtm;
    public $crt_usr_id;
    public $lud_dtm;
    public $lud_usr_id;
    public $confirm;
    public $confirm_dtm;
    
     public function __construct($event_id,$usr_id,$crt_dtm, $crt_usr_id, $lud_dtm,$lud_usr_id,$confirm,$confirm_dtm){
     
         $this->event_id =$event_id;
         $this->usr_id=$usr_id;
         $this->crt_dtm=$crt_dtm;
         $this->crt_usr_id=$crt_usr_id;
         $this->lud_dtm=$lud_dtm;
         $this->lud_usr_id=$lud_usr_id;
         $this->confirm=$confirm;
         $this->confirm_dtm=$confirm_dtm;
     }
    
}
