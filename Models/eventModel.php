<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventModel
 *
 * @author snandyala
 */
require_once 'Event.php';
require_once 'DbConnection.php';
class eventModel extends DbConnection{
    //put your code here
     public function insertEvent($EventObj) { 
          $this->tablename='hb_t_event';
          $query = "INSERT INTO $this->tablename SET ";
      foreach ($EventObj as $item => $value) {
         $query .= "$item='$value', ";
      } 
      
       $query = rtrim($query, ', ');
       
       $result = $this -> insertQuery($query); 
       return $result;
          
      }
      public function selectEventTypes()
      {
          $this->tablename='hb_t_st_options';
          $eventTypes=array();
          $query="select * from $this->tablename where tbl_name='EventType'";
          $result = $this -> query($query); 
            if($result === false) { 
 		return false; 
            } 
            while ($row = $result -> fetch_assoc()) { 
                $eventTypes[]=$row;
            }
             return $eventTypes;
      }
      public function selectEvents($patientId){
          $this->tablename='hb_t_event';
          $events=array();
          $query="select * from $this->tablename where CRT_usr_id=$patientId";
          $result = $this -> query($query); 
            if($result === false) { 
 		return false; 
            } 
            while ($row = $result -> fetch_assoc()) { 
 			
                $stDate=$row['start_date'];
                $edDate=$row['end_date'];
                $stTime=$row['start_time'];
                $edTime= $row['end_time'];
                $stDateTime= $stDate.' '. $stTime;
                if($edDate==null || $edDate=='')
                {
                    $edDate=$stDate;
                }
                $edDateTime= $edDate.' '.$edTime;
                $e = array();
                $e['id'] = $row['id'];
                $e['title'] = $row['title'];
                $e['description'] = $row['description'];
                $e['location'] = $row['location'];
                $e['start'] = $stDateTime;
                $e['end'] = $edDateTime;
                $e['allDay'] = false;

                array_push($events, $e);   
            } 
            return $events;
      }
              
      public function deleteEvents($EventId)
      {
            $this->tablename='hb_t_event';
            $query= "delete  from $this->tablename where id=".$EventId;
            $result=$this->query($query);
            return $result;
      }
}
