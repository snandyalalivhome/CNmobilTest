<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acct
 *
 * @author snandyala
 */
class Acct {
    //put your code here
    public $logo;
    public $name;
    public function __construct($logo,$name)
    {
        $this->logo=$logo;
        $this->name=$name;
    }
}
