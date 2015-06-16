<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profileField
 *
 * @author snandyala
 */
class ProfileField {
    //put your code here
    public $id;
    public $name;
    
     public function __construct($id,$stat_id,$name)
    { 
         $this->id=$id;
         $this->name=$name;
    }
     
}
