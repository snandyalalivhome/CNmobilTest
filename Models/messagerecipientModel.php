<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of messagerecipientModel
 *
 * @author snandyala
 */
include_once 'DbConnection.php';
include_once 'message_recipient.php';
class messagerecipientModel extends DbConnection {
    //put your code here
     public function insertMsgRecipient($MsgRecipientObj) { 
          $this->tablename='hb_t_message_recipient';
          $query = "INSERT INTO $this->tablename SET ";
      foreach ($MsgRecipientObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this ->query($query); 
       return $result;
          
      }
}
