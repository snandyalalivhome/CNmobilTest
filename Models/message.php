<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author glopez
 */
class message {
  
    //public $Id;
    //public $parent_msg_id ;
    public $is_not_event;
    public $stat_id;
    public $type_id;
    public $sender_usr_id;
    public $subject;
    public $content;
    public $crt_dtm;
    public $crt_usr_id;
    public $lud_dtm;
    public $lud_usr_id;
    
    // $Id,$parent_msg_id,$is_not_event,$stat_id,$type_id,$sender_usr_id,$subject,$content,$crt_dtm,$crt_usr_id,$lud_dtm,$lud_usr_id
    public function __construct($is_not_event,$stat_id,$type_id,$sender_usr_id,$subject,$content,$crt_dtm,$crt_usr_id,$lud_dtm,$lud_usr_id)    
    {    
        //$this->Id = $Id;  
        //$this->parent_msg_id = $parent_msg_id;  
        $this->is_not_event = $is_not_event;  
        $this->stat_id = $stat_id;  
        $this->type_id = $type_id;  
        $this->sender_usr_id = $sender_usr_id;  
        $this->subject = $subject;  
        $this->content = $content;  
        $this->crt_dtm=$crt_dtm;
        $this->crt_usr_id=$crt_usr_id;
        $this->lud_dtm=$lud_dtm;
        $this->lud_usr_id=$lud_usr_id;
    }
}
