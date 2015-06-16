<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileValues
 *
 * @author snandyala
 */
class ProfileValues {
    //put your code here
    public $field_id;
    public $usr_id;
    public $value;
    public $crt_dtm;
    public $lud_dtm;
    public $lud_usr_id;
    public $security_id;
    
    public function __construct($field_id,$usr_id,$value,$crt_dtm,$lud_dtm,$lud_usr_id,$security_id)
    {
        $this-> field_id=$field_id;
        $this->usr_id= $usr_id;
        $this->value=$value;
        $this->crt_dtm= $crt_dtm;
        $this->lud_dtm =$lud_dtm;
        $this->lud_usr_id=$lud_usr_id;
        $this->security_id=$security_id;
               
    }

    
}
