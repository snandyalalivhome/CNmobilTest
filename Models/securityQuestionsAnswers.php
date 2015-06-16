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
class securityQuestionsAnswers {
    //put your code here
    public $Id;
    public $usr_id;
    public $qu_id ;
    public $answer;
    public $crt_dtm;
    public $crt_usr_id ;
    
    public function __construct($Id,$usr_id, $qu_id, $answer, $crt_dtm, $crt_usr_id)    
    {    
        $this->Id = $Id;  
        $this->usr_id = $usr_id;  
        $this->group =$qu_id;  
        $this->answer = $answer;  
        $this->crt_dtm = $crt_dtm;  
        $this->crt_usr_id =$crt_usr_id;        
    } 
  
}