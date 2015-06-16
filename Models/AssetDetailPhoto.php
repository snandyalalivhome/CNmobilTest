<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssetDetailPhoto
 *
 * @author snandyala
 */

class AssetDetailPhoto {
    //put your code here
   
    public $asset_id;
    public $y_size_pixels ;
    public $x_size_pixels ;
    public $crt_usr_id;
    public $crt_dtm;
    public $lud_usr_id;
    public $lud_dtm;
    public function __construct($asset_id,$y_size_pixels,$x_size_pixels, $crt_usr_id, $crt_dtm,$lud_usr_id,$lud_dtm)
    {    
        $this->asset_id = $asset_id; 
        $this->y_size_pixels = $y_size_pixels;  
        $this->x_size_pixels = $x_size_pixels;  
        $this->crt_usr_id = $crt_usr_id;  
        $this->crt_dtm=$crt_dtm;
        $this->lud_usr_id=$lud_usr_id;
        $this->lud_dtm=$lud_dtm;
    
    } 
}
