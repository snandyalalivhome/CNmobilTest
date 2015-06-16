<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assetModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'Asset.php';
class assetModel  extends DbConnection {
    //put your code here
      protected static $connection; 
     // protected static $tablename= 'hb_t_asset';
      public function insertAsset($AssetObj) { 
          $this->tablename='hb_t_asset';
          $query = "INSERT INTO $this->tablename SET ";
      foreach ($AssetObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this -> insertQuery($query); 
       return $result;
          
      }
      
      public function updateAsset($AssetDetailID, $AssetID) { 
          $this->tablename='hb_t_asset';
      //$query= "SELECT id, fname, lname, email_addr, homebridge.hb_t_usr_network.* FROM hb_t_usr_network inner join hb_t_usr on id = usr_id where related_usr_id='".$_SESSION['cuserid']."'";
        $query = "UPDATE $this->tablename SET detail_id=".$AssetDetailID." Where id=". $AssetID;
     
       $result = $this -> Query($query); 
       return $result;
          
      }
      
}
