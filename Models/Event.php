<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author snandyala
 */
class Event {
    //put your code here
    public $title;
    public $type_id;
    public $creator_usr_id;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public $description;
    public $location;
    public $visibility_id;
    public $crt_usr_id;
    public $crt_dtm;
    public $isPrivate;
    public $stat_id;
    public $expired_notifi;
    public $priority_id;
    public $recurrence_id;
    public $lud_usr_id;
    public $lud_dtm;
    
    
     public function __construct($title,$type_id,$creator_usr_id, $start_date, $end_date,$start_time,$end_time,$description,$location,$visibility_id,$crt_usr_id,$crt_dtm,$isPrivate,$stat_id,$expired_notifi,$priority_id,$recurrence_id,$lud_usr_id,$lud_dtm){
         $this->title=$title;
         $this->creator_usr_id=$creator_usr_id;
         $this->start_date= $start_date;
         $this->end_date=$end_date;
         $this->start_time=$start_time;
         $this->end_time=$end_time;
         $this->description=$description;
         $this->location=$location;
         $this->visibility_id=$visibility_id;
         $this->crt_usr_id=$crt_usr_id;
         $this->crt_dtm=$crt_dtm;
         $this->isPrivate=$isPrivate;
         $this->stat_id=$isPrivate;
         $this->expired_notifi=$expired_notifi;
         $this->priority_id=$priority_id;
         $this->recurrence_id=$recurrence_id;
         $this->lud_dtm=$lud_dtm;
         $this->lud_usr_id=$lud_usr_id;
                 
             
     }
    
    
           
}
