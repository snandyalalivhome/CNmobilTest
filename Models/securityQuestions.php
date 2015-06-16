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
class securityQuestions {
    //put your code here
    public $Id;
    public $question;
    public $group ;
    
    public function __construct($Id,$question, $group)    
    {    
        $this->Id = $Id;  
        $this->question = $question;  
        $this->group =$group;  
       
    } 
  
}
