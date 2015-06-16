<?php

// START code to redirect on linux Apache server -Sn
 $config=parse_ini_file('resources/config.ini'); 
 $currentUrl=  get_full_url();
 $loginPage= get_full_url().$config['login.page.from.index.linux'];
 header("Location: $loginPage");
// END code to redirect on linux Apache server

// On windows Apache server

// header("Location: Views/login.php");
exit;

     function get_full_url() {
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

?>