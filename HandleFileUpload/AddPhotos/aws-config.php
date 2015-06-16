<?php

return array(
    // Bootstrap the configuration file with AWS specific features
    'includes' => array('_aws'),
    'services' => array(
        // All AWS clients extend from 'default_settings'. Here we are
        // overriding 'default_settings' with our default credentials and
        // providing a default region setting.
        'default_settings' => array(
            'params' => array(
                'credentials' => array(
                    'key'    => 'AKIAJGWWQI75YB7772UA',
                    'secret' => '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',
                ),
                'region' => 'us-east-1'
            )
        )
    )
);