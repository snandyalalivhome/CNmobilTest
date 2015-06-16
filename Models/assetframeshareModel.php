<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assetframeshareModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'AssetFrameShare.php';
class assetframeshareModel extends DbConnection {
    //put your code here
     
    public function insertFrameShare($FrameShareObj) { 
         $this->tablename='hb_t_asset_frame_share';
      //$query= "SELECT id, fname, lname, email_addr, homebridge.hb_t_usr_network.* FROM hb_t_usr_network inner join hb_t_usr on id = usr_id where related_usr_id='".$_SESSION['cuserid']."'";
        $query = "INSERT INTO $this->tablename SET ";
      foreach ($FrameShareObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this -> insertQuery($query); 
       return $result;
          
      }
      
      public function getFrame($userId){
          $this->tablename='hb_t_asset_frame_share';
          $this->assetTablename='hb_t_asset';
          $this->collectionTablename='hb_t_asset_collection_member';
       $query= "select asset_name, entity_id from hb_t_asset 
                Inner Join hb_t_asset_collection_member on hb_t_asset.id= hb_t_asset_collection_member.asset_id
                Inner Join hb_t_asset_frame_share on hb_t_asset_frame_share. entity_id= hb_t_asset_collection_member.id
                where hb_t_asset.crt_usr_id=".$userId;
       $result = $this -> selectAssetName($query); 
       if($result===null)
       {
          
       }
       return $result;
          
      }
      
      public function getEntities($userId){
       $this->tablename='hb_t_asset_frame_share';
         $query= "select * from $this->tablename where usr_id=".$userId;
       $result = $this -> select($query); 
       if($result===null)
       {
          
       }
       return $result;
      }
      
      public function getEntityId($asset_name)
      {
          $this->tablename='hb_t_asset_frame_share';
          $this->assetTablename='hb_t_asset';
          $this->collectionTablename='hb_t_asset_collection_member';
       $query= "select  entity_id from hb_t_asset 
                Inner Join hb_t_asset_collection_member on hb_t_asset.id= hb_t_asset_collection_member.asset_id
                Inner Join hb_t_asset_frame_share on hb_t_asset_frame_share. entity_id= hb_t_asset_collection_member.id
                where hb_t_asset.asset_name='".$asset_name."'";// to do add where user id
       $result = $this ->selectEntityId($query); 
       if($result===null)
       {
          
       }
       return $result;
          
      }
      
      public function deleteFrameShare($entity_id){
          $this->tablename='hb_t_asset_frame_share';
          $query= "delete  from $this->tablename where entity_id=".$entity_id;
           $result=$this->query($query);
           return $result;
      }
       public function selectAssetName($query) { 
        $rowlist=array();
        $result = $this -> query($query); 
 		if($result === false) { 
 			return false; 
 		} 
 		while ($row = $result -> fetch_assoc()) { 
 			
                  $rowlist[]=$row;
                    
 		} 
 		return $rowlist; 
       
       }
       public function selectEntityId($query)
       {
           $entityId;
           $result = $this -> query($query); 
 		if($result === false) { 
 			return false; 
 		} 
 		while ($row = $result -> fetch_assoc()) { 
 			
                  $entityId=$row;
                    
 		} 
 		return $entityId; 
       }
        public function select($query) { 
               $frameList= array();
 		$result = $this -> query($query); 
 		if($result === false) { 
 			return false; 
 		} 
 		while ($row = $result -> fetch_assoc()) { 
 			
                     $frame = new AssetFrameShare($row['id'],$row['entity_id'],$row['entity_type'],$row['usr_id'],$row['crt_usr_id'],$row['crt_dtm'],$row['lud_usr_id'],$row['lud_dtm'],$row['is_hide']);
                     $frameList[]=$frame;
                    
 		} 
 		return $frameList; 
 	} 
}
