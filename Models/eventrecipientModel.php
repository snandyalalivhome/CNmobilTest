<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventrecipientModel
 *
 * @author snandyala
 */
require_once 'EventRecipient.php';
require_once 'DbConnection.php';
class eventrecipientModel extends DbConnection {
    //put your code here
     public function insertEventRecipient($EventRecipientObj) { 
          $this->tablename='hb_t_event_recipients';
          $query = "INSERT INTO $this->tablename SET ";
      foreach ($EventRecipientObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this -> insertQuery($query); 
       return $result;
          
      }
}
