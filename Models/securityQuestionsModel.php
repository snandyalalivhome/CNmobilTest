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
require_once 'securityQuestions.php';

class securityQuestionsModel extends DbConnection {
    //put your code here
    
    public function select($query) { 
 		//$rows = array(); 
        
                $questionsList= array();
 		$result = $this -> query($query); 
                
 		if($result === false) { 
 			return false; 
 		} 
                
 		while ($row = $result -> fetch_assoc()) {  
                    
                    $question = new securityQuestions($row['id'],$row['question'] ,$row['group']);
                    $questionsList[]=$question;
 		} 
                
 		return $questionsList; 
    } 
    
    public function save($query) {
        
    }
}

