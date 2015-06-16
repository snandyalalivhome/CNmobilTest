<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of saveAsset
 *
 * @author snandyala
 */
require_once '../../Models/assetModel.php';
require_once '../../Models/assetdetailphotoModel.php';
require_once '../../Models/assetcollectionmemberModel.php';
require_once '../../Models/assetcollectionModel.php';
require_once '../../Models/assetframeshareModel.php';
class saveAsset {
    //put your code here
     public function saveModel($fileobjs=array(),$patientId,$userId,$imagesPixels =array())  
     { 
        
           
       
         // save t_asset with photo name, size, mime type etc
         // save t_asset_collection_member with album_id = default album id, asset_id = t_asset's ID
         // save t_asset_details with asset_id= t_asset's ID, x, y pixs of all photo versions
         // save t_asset_frame_share with entity_id= t_asset_collection_member's ID , Share to usr_id =patient id. 
         
         // insert details of uploaded photo in t_asset
             $assetId= $this->saveAssetInfo($fileobjs,$patientId,$userId,$imagesPixels);
            // insert details of all pic versions saved in s3 to the table t_asset_details with asset_id= t_asset's ID, x, y pixs of all photo versions
            
         //get default albumId for loggedin user
           $defaultAlbumID= $this->getDefaultAlbum($userId);
        
         
      
         // insert t_asset and get the ID, save in asset_id of t_asset_collection_member, album_id= default albumId for loggedin user
         
           $assetColMemID= $this->saveAssetCollectionMemberInfo($defaultAlbumID, $assetId, $userId);
         
          // insert t_asset_frame_share with entity_id= t_asset_collection_member's ID , usr_id =patient id. 
           
           $frameId= $this->saveAssetFrameShareInfo($assetColMemID, $patientId, $userId);
           
           if($frameId!=null)
           {
               return 1;
               // return entity id
             //  $assetframeShareModel= new assetframeshareModel();
               //$entityId= $assetframeShareModel->getFrame($frameId);
              // return $entityId;
               //send notification
           }
         
              
     }
     public function getDefaultAlbum($userId)
     {
          $assetCollection =new assetcollectionModel();
          $albumId= $assetCollection->SelectAlbum($userId);
          return $albumId;
     }
     
     public function saveAssetInfo($fileobjs=array(),$patientId,$userId,$imagesPixels)
     {
          $assetModel= new assetModel(); 
      
          for($i=0;$i<count($fileobjs);$i++)
                {
                  $fileobj=$fileobjs[$i];
                  $assetDto= new Asset();
                  $assetDto->owner_id= $userId;
                  $assetDto->asset_name= $fileobj->name;
                  $assetDto->asset_description='';
                  $assetDto->file_size_bytes=$fileobj->size;
                  $assetDto->mime_type =$fileobj->type;
                  $assetDto->crt_usr_id= $userId;
                  $assetDto->crt_dtm= date("Y-m-d H:i:s");
                  $assetDto->lud_dtm=date("Y-m-d H:i:s");
                  $assetDto->lud_usr_id=$userId;
                  $assetDto->is_hide=0;
                  $assetDto->is_frame=0;
                  // t_asset_detail_photo record id
                  //$assetDto->detail_id='';
                  $assetDto->type_id=1;
                  $assetDto->security_level_id=30;     
                  $assetID=   $assetModel ->insertAsset($assetDto);   
                  
                  // get insertAsset Id and save in t_asset_detail_photo as asset_id
                    $tmp=$imagesPixels[0];
                        $tmp1=$imagesPixels[1];
                        
                   
                        
                  $assetdetailId=  $this->saveAssetDetaiPhotoInfo($assetID,$userId,$imagesPixels[0],$imagesPixels[1]);
                    
                  //update t_asset table with detail_id= t_asset_detail_photo's ID
                  if(!empty($assetdetailId))
                  {
                      $result= $assetModel->updateAsset($assetdetailId, $assetID);
                  }
                }
                return $assetID;
     }
     
     public function saveAssetDetaiPhotoInfo($assetID,$userId,$img_width,$img_height)
     {
         $assetdetailphotoModel=new assetdetailphotoModel();
         
         $assetdetailphotoDTO= new AssetDetailPhoto();
         
         $assetdetailphotoDTO->asset_id= $assetID;
         $assetdetailphotoDTO->x_size_pixels= $img_width;
         $assetdetailphotoDTO->y_size_pixels=$img_height;
         $assetdetailphotoDTO->crt_usr_id=$userId;
         $assetdetailphotoDTO->crt_dtm= date("Y-m-d H:i:s");
         $assetdetailphotoDTO->lud_dtm=date("Y-m-d H:i:s");
         $assetdetailphotoDTO->lud_usr_id=$userId;
         
         $assetdetailId= $assetdetailphotoModel->insertAssetDetPhoto($assetdetailphotoDTO);
         
       return $assetdetailId;
     }
     
    
     public function saveAssetCollectionMemberInfo($albumId,$assetId,$userId)
     {
         $assetcollectionmemberModel= new assetcollectionmemberModel();
       
         $assetColMemDTO= new AssetCollectionMember();
         
         $assetColMemDTO->asset_id = $assetId;
         $assetColMemDTO->asset_collection_id=$albumId;
         $assetColMemDTO->alternate_description ='';
         $assetColMemDTO->alternate_title="TestLH";
       
         $assetColMemDTO->crt_dtm=date("Y-m-d H:i:s");
         $assetColMemDTO->lud_dtm=date("Y-m-d H:i:s");;
         $assetColMemDTO->crt_usr_id=$userId;
         $assetColMemDTO->lud_usr_id=$userId;
         $assetColMemDTO->is_hide=0;
         $assetColMemDTO->is_featured=0;
         
         $assetColMemID= $assetcollectionmemberModel->insertAssetColMem($assetColMemDTO);
         
         return $assetColMemID;
         
     }
     
     public function saveAssetFrameShareInfo($assetColMemID,$patientId,$userId)
     {
         $assetframeShareModel= new assetframeshareModel();
         
         $assetFrameDTO= new AssetFrameShare();
         $assetFrameDTO->entity_id=$assetColMemID;
         $assetFrameDTO->usr_id =$patientId;
         $assetFrameDTO->crt_dtm=date("Y-m-d H:i:s");
         $assetFrameDTO->lud_dtm= date("Y-m-d H:i:s");
         $assetFrameDTO->crt_usr_id =$userId;
         $assetFrameDTO-> lud_usr_id=$userId;
         $assetFrameDTO->entity_type=1;
         $assetFrameDTO->is_hide=0;
         
         $result= $assetframeShareModel->insertFrameShare($assetFrameDTO);
         return $result;
                 
         
                 
     }
}
