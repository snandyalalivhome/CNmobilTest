<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landingpageController
 *
 * @author glopez
 */

require_once  '../Models/securityQuestionsModel.php';
require_once  '../Models/securityQuestionsAnswersModel.php';

class SecurityQuestionsController {
    //put your code here
    public $model; 
    public $ansmodel;
      
    public function __construct()    
    {    
        $this->model = new securityQuestionsModel();  
        $this->ansmodel = new securityQuestionsAnswersModel();   
    }
    
    public function select()  
    { 
        $query= "SELECT * FROM homebridge.hb_t_security_questions";
        $rows = $this->model -> select($query);   
        //$sQuestions=$rows;
       // $months= $this->getMonth();
        //$years=$this->getYears();
        $starting_year=1900;
        $ending_year= date('Y');
        include '../Views/SecurityQuestions.php';

    }

    function getMonth() {
        $month_options = array();
        for( $i = 1; $i <= 12; $i++ ) {
            $month_num = str_pad( $i, 2, 0, STR_PAD_LEFT );
            $month_name = date( 'F', mktime( 0, 0, 0, $i + 1, 0, 0, 0 ) );
            $month_options[] =  $month_name ;
        }
        return $month_options;//'<select name="' . $field_name . '">' . $month_options . '</select>';
    }
    
    function getYears() {
        $year_options=  array();
        $starting_year=1900;
        $ending_year=date("Y");
        for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                    //if($starting_year == date('Y')) {
                    $year_options[]=     $starting_year;                   
                    //}
        }
        return $year_options;
    }
    public function save()  
    {     
        $a1 = $_POST['A1'];
        $result = $this->ansmodel -> save($_SESSION['cuserid'], $_POST['Q1'], $_POST['A1'], $_POST['Q2'], $_POST['A2'], $_POST['Q3'], $_POST['A3']);   
        
        if($result)
        {
             include_once("../Controller/loginController.php"); 
             $controller = new loginController(); 
             $controller->prepareLandingPage(); 
        }
            

    }
          
     
}

