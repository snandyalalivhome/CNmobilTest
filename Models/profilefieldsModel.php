<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profilefieldsModel
 *
 * @author snandyala
 */
require_once 'ProfileField.php';
require_once 'DbConnection.php';
class profilefieldsModel extends DbConnection {
    //put your code here
     public function __construct()    
    {    
        $this->table_name = 'hb_t_usr_profile_fields';    
    }
      public function selectByTitle($Title) { 
 		//$rows = array(); 
            
                $fieldId;
                  $query="SELECT id FROM $this->table_name WHERE title='".$Title."'";
 		$result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) { 
 			$fieldId= $row; 
                      
 		} 
                
 		return $fieldId; 
 	}
}
