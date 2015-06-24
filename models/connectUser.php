<?php

function connectUser($user,$password){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "SELECT * FROM utilisateur WHERE lelogin = '$user' AND lepass = '$password' ";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
        
    }else{
        
        return false;
        
    }
    
}