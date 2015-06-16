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
require_once 'securityQuestionsAnswers.php';

class securityQuestionsAnswersModel extends DbConnection {
    //put your code here
    
    public function save($userId, $Q1, $A1, $Q2, $A2, $Q3, $A3) { 
        $query="DELETE FROM hb_t_usr_security_answers WHERE usr_id=$userId AND qu_id NOT IN ($Q1,$Q2,$Q3)";
        $result = $this -> query($query);
        $now = date("Y-m-d H:i:s");
        
        $query = "SELECT COUNT(*) as ct FROM hb_t_usr_security_answers WHERE usr_id=$userId AND qu_id=$Q1";
        $count = $this -> query($query);
        while ($row = $count -> fetch_assoc()) { 
            $ct = $row['ct'];
        }
        if ($ct > 0){
            $query="UPDATE hb_t_usr_security_answers
                    SET answer='". $A1."',  
                    crt_dtm='". $now."'
                    WHERE usr_id=$userId AND qu_id=$Q1";
            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            } 
        }
        else
        {
            $query="INSERT INTO hb_t_usr_security_answers (usr_id, qu_id, answer, crt_dtm, crt_usr_id)
                    VALUES('". $userId."','". $Q1."','". $A1."','". $now."','". $userId."')"; 

            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            } 
        }
        
        $query = "SELECT COUNT(*) as ct FROM hb_t_usr_security_answers WHERE usr_id=$userId AND qu_id=$Q2";
        $count = $this -> query($query);
        while ($row = $count -> fetch_assoc()) { 
            $ct = $row['ct'];
        }
        
        if ($ct > 0){
            $query="UPDATE hb_t_usr_security_answers
                SET answer='". $A2."',  
                crt_dtm='". $now."'
                WHERE usr_id=$userId AND qu_id=$Q2";
            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            }
        }
        else
        {
            $query="INSERT INTO hb_t_usr_security_answers (usr_id, qu_id, answer, crt_dtm, crt_usr_id)
                    VALUES('". $userId."','". $Q2."','". $A2."','". $now."','". $userId."')"; 

            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            } 
        }
        
        $query = "SELECT COUNT(*) as ct FROM hb_t_usr_security_answers WHERE usr_id=$userId AND qu_id=$Q3";
        $count = $this -> query($query);
        while ($row = $count -> fetch_assoc()) { 
            $ct = $row['ct'];
        }
        
        if ($ct > 0){
            $query="UPDATE hb_t_usr_security_answers
                SET answer='". $A3."',  
                crt_dtm='". $now."'
                WHERE usr_id=$userId AND qu_id=$Q3";
            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            } 
        }
        else
        {
            $query="INSERT INTO hb_t_usr_security_answers (usr_id, qu_id, answer, crt_dtm, crt_usr_id)
                    VALUES('". $userId."','". $Q3."','". $A3."','". $now."','". $userId."')"; 

            $result = $this -> query($query); 
            if($result === false) { 
                return false; 
            } 
        }
        
        return true;
        
    } 
    

}

