<?php

function connect($server, $login, $pwd, $db){
    
    $connect =  mysqli_connect($server, $login, $pwd, $db) or die("ERROR MASTER DB CONNECTION");
    
    mysqli_set_charset($connect,"utf8");
    
    return $connect;
    
}