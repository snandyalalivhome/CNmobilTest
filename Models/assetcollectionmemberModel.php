<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssetCollectionMemberModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'AssetCollectionMember.php';
class assetcollectionmemberModel extends DbConnection {
    //put your code here
     public function insertAssetColMem($AssetColMembObj) { 
          $this->tablename='hb_t_asset_collection_member';
      //$query= "SELECT id, fname, lname, email_addr, homebridge.hb_t_usr_network.* FROM hb_t_usr_network inner join hb_t_usr on id = usr_id where related_usr_id='".$_SESSION['cuserid']."'";
        $query = "INSERT INTO $this->tablename SET ";
      foreach ($AssetColMembObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this -> insertQuery($query); 
       return $result;
          
      }
}
