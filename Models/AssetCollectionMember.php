<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssetCollectionMember
 *
 * @author snandyala
 */
class AssetCollectionMember {
    //put your code here
    public $asset_collection_id;
    public $asset_id;
    public $sort_order ;
    public $is_featured;
    public $alternate_title;
    public $alternate_description;
    public $crt_usr_id;
    public $crt_dtm;
    public $lud_usr_id;
    public $lud_dtm;
    public $is_hide;
    
    public function __construct($asset_collection_id,$asset_id,$sort_order, $is_featured, $alternate_title,$alternate_description,$crt_usr_id,$crt_dtm,$lud_usr_id,$lud_dtm,$is_hide)    
    {    
        $this->asset_collection_id = $asset_collection_id; 
        $this->asset_id = $asset_id;  
        $this->sort_order = $sort_order;  
        $this->is_featured = $is_featured;  
        $this->alternate_title = $alternate_title;  
        $this->alternate_description = $alternate_description;  
        $this->crt_usr_id = $crt_usr_id; 
        
        $this->crt_usr_id = $crtUsrId;  
        $this->crt_dtm=$crt_dtm;
        $this->lud_usr_id=$lud_usr_id;
        $this->lud_dtm=$lud_dtm;
        $this->is_hide=$is_hide;
 
    } 
}
