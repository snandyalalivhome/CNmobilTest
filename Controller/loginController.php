<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginController
 *
 * @author snandyala
 */

require_once '../Models/usrModel.php';

require_once '../Models/acctModel.php';

require_once '../API/GetProfilePics.php';

require_once 'landingpageController.php';

 // $main= new loginController();
//  $main->validate();
  
class loginController {
    //put your code here
    public $model; 
    // public $selfinstantiate= new loginController();
    public function __construct()    
    {    
        $this->model = new usrModel();    
    }
    
    public function validate()  
    {  
        if(isset($_POST['username']) && isset($_POST['password']))
        {
           
            $username = $_POST['username'];
            $password =$_POST['password']; //sha1($_POST['password']); // to hash password
       
            $condition= $username;  
            $rows = $this->model ->selectByEmail($condition);   
           
            if(count($rows)!=0)
            {
                $obj =$rows[0];
                $dbpswd= $obj->password;
                $screenname= $obj->screenName;
                $userid= $obj->userId;
                if(md5($password)== $dbpswd)
                {
                  
                    $_SESSION['cusername'] = $screenname; 
                    $_SESSION['cuserid'] = $userid; 
                    $_SESSION['cauthToken'] =sha1($_POST['username']);
                    
                     // check for T&C page confirmation
                    if($obj->confirm !=1)
                    {
                        
                         include '../Views/TermsOfUse.php';
                         exit;
                    }
                    $this->prepareLandingPage();
                    session_write_close();

                }
                else
                {
                     $_SESSION['noemailexists'] =false;
                     $_SESSION['error'] =true;
                    include '../Views/login.php';
                }
            }
        }
        else
        {
              
             $_SESSION['noemailexists'] =false;
            $_SESSION['error'] =false;
           // include '../Views/TermsOfUse.php';
            include '../Views/login.php'; 
       }

    }
      
              
    public function updateConfirm()
    {
     // update db
         $result = $this->model ->updateConfirmation($_SESSION['cuserid']);   
         if($result)
         {
            include_once("../Controller/SecurityQuestionsController.php"); 
            $controller = new SecurityQuestionsController(); 
            $controller->select();
            //$this->prepareLandingPage();
           // session_write_close();
         }
         else
         {
             $_SESSION['error'] =true;// replace this with error msg abt update confirmation
             include '../Views/login.php';
         }
    }
    
    public function logout()
    {
        session_destroy(); 
        $_SESSION['error'] =false;
         include '../Views/login.php'; 
    }
    
    public function forgotPassword()
    {
        if(isset($_POST['email']))
        {
            $email= $_POST['email'];
             $rows = $this->model ->selectByEmail($email);   
             if(count($rows)!=0)
            {
                 $newpswd= $this->generatePswd();
                 $userid= $rows[0]->userId;
                 // update new pswd in db
                 $encryptpwd=md5($newpswd);
                  $updated= $this->model->updatePswd($userid, $encryptpwd);
                 if($updated)
                 {
                 //todo email username and new pswd to the given email addr
                      $_SESSION['noemailexists'] =false;
                       $_SESSION['error'] =false;
                      include '../Views/login.php'; 
                 }
                 else
                 {
                      $_SESSION['noemailexists'] =false;
                       $_SESSION['error'] =false;
                     include '../Views/login.php'; 
                 }
                 
                 
            }
            else{
                 $_SESSION['noemailexists'] =true;
                  $_SESSION['error'] =false;
                 include '../Views/login.php'; 
            }
        }
    }
    public function generatePswd()
    {
       $alpha = "abcdefghijklmnopqrstuvwxyz";
       $alpha_upper = strtoupper($alpha);
       $numeric = "0123456789";
       $special = ".-+=_,!@$#*%<>[]{}";
       $chars = "";


           // default [a-zA-Z0-9]{9}
           $chars = $alpha . $alpha_upper . $numeric;
           $length = 9;


       $len = strlen($chars);
       $pw = '';

       for ($i=0;$i<$length;$i++)
               $pw .= substr($chars, rand(0, $len-1), 1);

       // the finished password
       $pw = str_shuffle($pw);
       return $pw;
    }
    public function prepareLandingPage()
    {
        
        if(!isset($_SESSION['cuserid'])) 
        { 
            header("Location: ../Views/login.php");
            exit; 
        }
        $getprofPic= new GetProfilePics();
       
        $profilepic=$getprofPic->getProfilePic($_SESSION['cuserid']);
        $_SESSION['profilepic']=$profilepic;
         
        $landingctrl= new landingpageController();
        $patientDetails= $landingctrl->selectPatientDetails();
        
        if ($patientDetails != 'NoData')
        {
            $patientPic=$getprofPic->getProfilePic($_SESSION['cpatientId']);
            $_SESSION['Patientprofilepic']=$patientPic;
            // $replacewith='account'.'/'
            // $accountpic=str_replace('user','account',$patientPic);
            //   $_SESSION['Usercompanypic']=$this->get_full_url().'/files/account/'.$_SESSION['cuserid'].'/logo/'.$_SESSION['cuserid'].'.png';
        }
        
        $logo= $this->getCompanyLogo($_SESSION['cuserid']);
        $_SESSION['companyLogo']=$logo;
        
        $landingctrl->select();
    }
    
      public function getCompanyLogo($patientid)
     {
        $acctmodel= new acctModel();
        $result= $acctmodel->selectLogo($patientid);
        if(count($result)!=0)
        {
           // $t=$result['logo'];
            $logoName=explode('.',$result['logo']);
            if(count($logoName) !=0)
            {
            $newlogoName=$logoName[0].'_mobile.'.$logoName[1];
            }
            else
            {
                $newlogoName='';
            }
            $config=parse_ini_file(dirname((dirname(__DIR__))). '/resources/config.ini'); 
          
            $main_dir= $config['account.pic.path']; //'/files/user/';
            $upload_dir=str_replace('__ACCID__', $result['acct_id'],$main_dir);
           // $logopath= '../../files/account/'.$result['acct_id'].'/logo/'.$newlogoName;
            $logopath=$upload_dir.$newlogoName;
            return $logopath;
        }
        else
            return '';
                
     }

  
     
/*    protected function get_file_object($file_name) {
        if ($this->is_valid_file_object($file_name)) {
            $file = new \stdClass();
            $file->name = $file_name;
            return $file;
        }
        return null;
    }
    */
      
    
  
}
