<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactModel
 *
 * @author snandyala
 */
require_once 'DbConnection.php';
require_once 'Contact.php';

class ContactModel extends DbConnection {
    //put your code here
    
    public function select($query) { 
 		//$rows = array(); 
        
                $contactList= array();
 		$result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) { 
 			//$rows[] = $row; 
                    $ph=$row['phone'];
                       $contact = new Contact($row['id'],$row['related_usr_id'] ,$row['role'],$row['fname'],$row['lname'],$row['email_addr'],$row['phone']);
                       $contactList[]=$contact;
 		} 
                
 		return $contactList; 
    } 
     
}
