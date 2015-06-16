<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message_recipient
 *
 * @author glopez
 */
class message_recipient {
    
    public $usr_id;
    public $message_id ;
    public $stat_id;
    public $crt_dtm;
    public $crt_usr_id;
    public $lud_dtm;
    public $lud_usr_id;
    
    public function __construct($usr_id,$message_id,$stat_id,$crt_dtm,$crt_usr_id,$lud_dtm,$lud_usr_id)    
    {    
        $this->usr_id = $usr_id;  
        $this->message_id = $message_id;
        $this->stat_id = $stat_id;  
        $this->crt_dtm=$crt_dtm;
        $this->crt_usr_id=$crt_usr_id;
        $this->lud_dtm=$lud_dtm;
        $this->lud_usr_id=$lud_usr_id;
    }
    
}
