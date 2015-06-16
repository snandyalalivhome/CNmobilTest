<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profilevaluesModel
 *
 * @author snandyala
 */
require_once 'ProfileValues.php';
require_once 'DbConnection.php';
class profilevaluesModel extends DbConnection {
    //put your code here
      public function __construct()    
    {    
        $this->table_name = 'hb_t_usr_profile_values';    
    }
    

    
    public function getProfileValues($userId,$fieldId)
    {
        $values=array();
        $query="select * from $this->table_name where usr_id=$userId and Field_id=$fieldId" ;
        $result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) { 
                    //$rowvalues=array();
 			$values[] = $row; 
                       
 		} 
                
 		return $values; 
    }
    
    public function updateProfileValue($fieldId,$newValues,$usrId)
    {
         $query="UPDATE $this->table_name SET value='".$newValues."' where field_id=$fieldId and usr_id=$usrId";
           $result = $this -> query($query); 
           if($result === false) { 
 			return false; 
 		} 
                else return true;
    }
    public function insertProfileValue($profValObj)
    {
        $this->tablename= 'hb_t_usr_profile_values'; 
            $query = "INSERT INTO $this->tablename SET ";
            foreach ($profValObj as $item => $value) {
               $query .= "$item='$value', ";
            } 

             $query = rtrim($query, ', ');

             $result = $this -> insertQuery($query); 
             return $result;

    }
}
