<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assetCollection
 *
 * @author snandyala
 */
class AssetCollection {
    //put your code here
        public $id;
        public $crt_usr_id;
        public function __construct($id,$crt_usr_id)
        {
         $this->id = $id; 
         $this->crt_usr_id = $crt_usr_id;  
        }
}
