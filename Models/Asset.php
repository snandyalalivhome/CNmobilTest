<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asset
 *
 * @author snandyala
 */
class Asset {
    //put your code here
    
    public $type_id;
    public $owner_id;
    public $detail_id ;
    public $security_level_id;
    public $asset_name;
    public $asset_description;
    public $file_size_bytes;
    public $mime_type;
    public $crt_usr_id;
    public $crt_dtm;
    public $lud_usr_id;
    public $lud_dtm;
    public $is_hide;
    public $is_frame;
  
    
    public function __construct($typeId,$ownerId,$detailId, $securityLevelId, $assetName,$assetDescription,$fileSize,$mimeType,$crtUsrId,$crtDateTime,$lstUpdDateTime,$lstUpdUsrId,$isHide,$isFrame)    
    {    
        $this->type_id = $typeId; 
        $this->owner_id = $ownerId;  
        $this->detail_id = $detailId;  
        $this->security_level_id = $securityLevelId;  
        $this->asset_name = $assetName;  
        $this->asset_description = $assetDescription;  
        $this->file_size_bytes = $fileSize; 
        $this->mime_type = $mimeType;  
        $this->crt_usr_id = $crtUsrId;  
        $this->crt_dtm=$crtDateTime;
        $this->lud_usr_id=$lstUpdDateTime;
        $this->lud_dtm=$lstUpdUsrId;
        $this->is_hide=$isHide;
        $this->is_frame=$isFrame;
    } 
}
