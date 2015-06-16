<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assetcollectionModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'AssetCollection.php';
class assetcollectionModel extends DbConnection{
    //put your code here
     public function SelectAlbum($userId) { 
          $this->tablename='hb_t_asset_collection';
        $query = "SELECT id from $this->tablename Where is_default=1 and crt_usr_id=".$userId ;
       $result = $this -> select($query); 
       if($result===null)
       {
            $result='701'; //default album when no album is there
       }
      
               return $result->id;
          
      }
      
      public function select($query) { 
               $album;
 		$result = $this -> query($query); 
 		if($result === false) { 
 			return false; 
 		} 
 		while ($row = $result -> fetch_assoc()) { 
 			//$rows[] = $row; 
                     $album = new AssetCollection($row['id'],$row['crt_ust_id']);
                    
 		} 
 		return $album; 
 	} 
}
