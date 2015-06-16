<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users_Model
 *
 * @author snandyala
 */
//require_once(realpath(dirname(__FILE__) . 'DbConnection.php'));
require_once 'DbConnection.php';
require_once 'Usr.php';

class usrModel extends DbConnection {
    //put your code here
    protected static $connection; 
    

 	/** 
 	 * Fetch rows from the database (SELECT query) 
 	 * 
 	 * @param $query The query string 
 	 * @return bool False on failure / array Database rows on success 
 	 */ 
     public function __construct()    
    {    
        $this->table_name = 'hb_t_usr';    
    }
 	public function selectByEmail($email) { 
 		//$rows = array(); 
               $tabname=$this->table_name;
                $usersList= array();
                $query="SELECT * FROM $this->table_name WHERE email_addr='".$email."' OR screen_name='".$email."'";
                
 		$result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) { 
 			//$rows[] = $row; 
                   
                       $user = new Usr($row['id'],$row['screen_name'] ,$row['usr_pw'],$row['fname'],$row['lname'],$row['device_id'],$row['user_app_id'],$row['zoom_host_id'],$row['email_addr'],$row['confirm'],$row['timezone'],$row['picture']);
                       $usersList[]=$user;
 		} 
                
 		return $usersList; 
 	} 
        public function selectById($id) { 
 		//$rows = array(); 
            
                $usersList;
                  $query="SELECT * FROM $this->table_name WHERE id='".$id."'";
 		$result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) { 
 			//$rows[] = $row; 
                    $tz=$row['timezone'];
                       $user = new Usr($row['id'],$row['screen_name'] ,$row['usr_pw'],$row['fname'],$row['lname'],$row['device_id'],$row['user_app_id'],$row['zoom_host_id'],$row['email_addr'],$row['confirm'],$row['timezone'],$row['picture']);
                       $usersList=$user;
 		} 
                
 		return $usersList; 
 	}
        
        public function updateConfirmation($userId)
        {
            $now=  date("Y-m-d H:i:s");
            $query="UPDATE $this->table_name
                    SET confirm=1,tc_accept_dtm ='". $now."'
                    WHERE id=$userId";
           $result = $this -> query($query); 
           if($result === false) { 
 			return false; 
 		} 
                else return true;
        }
        
        public function updatePswd($userId, $newPwd)
        {
            
            $query="UPDATE $this->table_name SET usr_pw='". $newPwd."' WHERE id=$userId";
           $result = $this -> query($query); 
           if($result === false) { 
 			return false; 
 		} 
                else return true;
        }
        public function updateTimeZone($userId,$timeZone)
        {
           // $now=  date("Y-m-d H:i:s");
            $query="UPDATE $this->table_name SET timezone='".$timeZone."' WHERE id=$userId";
           $result = $this -> query($query); 
           if($result === false) { 
 			return false; 
 		} 
                else return true;
        }
        
        public function updateUserPic($userId,$picName)
        {
            $query="UPDATE $this->table_name SET Picture='".$picName."' WHERE id=$userId";
           $result = $this -> query($query); 
           if($result === false) { 
 			return false; 
 		} 
                else
                    return true;
        }
     
}
