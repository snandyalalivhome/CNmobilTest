<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acctModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'Acct.php';
class acctModel extends DbConnection{
    //put your code here
    public function selectLogo($patientid) { 
      $this->acctTable='hb_t_acct';
      $this->acctUsrTable='hb_t_acct_usr';
    
      $query="select acct_id,logo from  $this->acctTable
                inner join $this->acctUsrTable on $this->acctUsrTable.acct_id = $this->acctTable.id
                where usr_id =".$patientid; 
      $result = $this -> select($query); 
               return $result;
    }
    
     public function select($query) { 
 		//$rows = array(); 
               $logo;
 		$result = $this -> query($query); 
 		if($result === false) { 
 			return false; 
 		} 
 		while ($row = $result -> fetch_assoc()) { 
 			$logo = $row;
                    
 		} 
 		return $logo; 
 	} 
}
