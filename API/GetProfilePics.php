<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getProfilePics
 *
 * @author snandyala
 */
require_once '../Models/usrModel.php';
class GetProfilePics {
    //put your code here
     public function __construct()    
    {
    
          
    }
      public function getProfilePic($userid)
    {
        
        // $upload_dir= $this->get_full_url().$upload_dir.$userid.'/';
          
        $config=parse_ini_file(dirname((dirname(__DIR__))). '/resources/config.ini'); 
          
        $main_dir= $config['profile.pic.path']; //'/files/user/';
        $upload_dir=str_replace('__USERID__', $userid,$main_dir);
        
//        $files=$this->get_file_objects('',$userid);
//        if(count($files)!=0)
//        {        
//            $latest_prof_pic=$files;            
//        }
        
        $usrmodel= new usrModel();
        $userDetails= $usrmodel->selectById($userid);
        $latest_prof_pic=$userDetails->picture;
        
       // $path= $this->get_full_url().$upload_dir.$userid.'/picture/'.$latest_prof_pic;
         //$path= dirname((dirname(__DIR__))).'/'.$upload_dir.$latest_prof_pic;
        $path= $upload_dir.$latest_prof_pic;

        // $tt= $this->get_full_url().'/Carenetworkmobilesite'.$upload_dir.$userid.'/picture/'.$latest_prof_pic;// on iis server
        // 
        //   $tt=$upload_dir.$userid.'/picture/'.$latest_prof_pic;
     
        return $path;
    }
    
    public function getProfilePicURL($userid)
    {
        
        // $upload_dir= $this->get_full_url().$upload_dir.$userid.'/';
          
        $config=parse_ini_file(dirname((dirname(__DIR__))). '/resources/config.ini'); 
          
        $main_dir= $config['profile.pic.upload.path']; //'/files/user/';
        $upload_dir=str_replace('__USERID__', $userid,$main_dir);
        
       // $files=$this->get_file_objects('',$userid);
//        $latest_prof_pic='';
//        if(count($files)!=0)
//        {        
//            $latest_prof_pic=$files;            
//        }
         $usrmodel= new usrModel();
        $userDetails= $usrmodel->selectById($userid);
        $latest_prof_pic=$userDetails->picture;
       // $path= $this->get_full_url().$upload_dir.$userid.'/picture/'.$latest_prof_pic;
         //$path= dirname((dirname(__DIR__))).'/'.$upload_dir.$latest_prof_pic;
        //$path= $upload_dir.$latest_prof_pic;

         $path= $this->get_full_url().$config['doc.root.extension'].$upload_dir.$latest_prof_pic;// 
        // 
        //   $tt=$upload_dir.$userid.'/picture/'.$latest_prof_pic;
     
        return $path;
    }
    
    protected function get_full_url() {
        $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
            !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
        $path= ($https ? 'https://' : 'http://').
            (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
            ($https && $_SERVER['SERVER_PORT'] === 443 ||
            $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT'])));
               
        return $path;
    }
    
    protected function get_upload_path($file_name = null, $userid=null) {
	 $config=parse_ini_file(dirname((dirname(__DIR__))). '/resources/config.ini'); 
        $file_name = $file_name ? $file_name : '';
        $userid=$userid?$userid:'';
        $main_dir= $config['profile.pic.path'];
        $upload_dir=str_replace('__USERID__', $userid,$main_dir);
        //  $tt=$_SERVER['DOCUMENT_ROOT'].'/CarenetworkMobileSite/' .$upload_dir.$userid.'/picture/'.$file_name; // on iis server give /carenetworkmobuilesite/
     //  $path=$_SERVER['DOCUMENT_ROOT'].$upload_dir.$userid.'/picture/'.$file_name; // on iis server give /carenetworkmobuilesite/
        //  $tt=$upload_dir.$userid.'//picture//'.$file_name;
        $path=$upload_dir;
        return $path;  
    }

     
    protected function get_file_objects($iteration_method = 'get_file_object',$userid) {
       
       $upload_dir = $this->get_upload_path('',$userid);
        if (!is_dir($upload_dir)) {
            return array();
        }
        $validFiles=array();
        $files=  scandir($upload_dir);
        for($i=0;$i<count($files);$i++)
        {
           if($this->is_valid_file_object($files[$i]))
           {
               $validFiles=$files[$i];
           }
        }
        return $validFiles;
    }
    
    protected function is_valid_file_object($file_name) {
       // $file_path = $this->get_upload_path($file_name);
        if ( $file_name[0] !== '.') {
            return true;
        }
        return false;
    }
}
