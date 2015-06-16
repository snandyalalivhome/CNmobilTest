<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testAmazonS3
 *
 * @author snandyala
 */

use Aws\S3\S3Client;
use Aws\DynamoDb\DynamoDbClient;
require 'aws-autoloader.php';

class testAmazonS3 {
    //put your code here
   
    function __construct() {
        
        $aws = Aws::factory('aws-config.php');
        $s3Client = $aws->get('s3');
        
        $s3Client = S3Client::factory(array(
    'credentials' => array(
        'key'    => 'YOUR_AWS_ACCESS_KEY_ID',
        'secret' => 'YOUR_AWS_SECRET_ACCESS_KEY',
    )
));
        
// Instantiate a client with the credentials from the project1 profile
/*$dynamoDbClient = DynamoDbClient::factory(array(
    'profile' => 'project1',
    'region'  => 'us-west-2',
));*/
    }
    
}


