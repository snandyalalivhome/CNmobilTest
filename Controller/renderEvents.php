<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of renderEvents
 *
 * @author snandyala
 */

    //put your code here
        require('eventController.php');  
        $eventCtrl = new eventController();
        return $eventCtrl->GetEvents();
     
   

