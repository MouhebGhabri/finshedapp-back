<?php

   function checkAuthenticate(){
        if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
    
            if ($_SERVER['PHP_AUTH_USER'] != "mouheb" ||  $_SERVER['PHP_AUTH_PW'] != "mouheb123"){
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Page Not Found';
                exit;
            }
        } else {
            exit;
        }
    }
     ?>