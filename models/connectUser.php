<?php

function connectUser($user,$password){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "SELECT u.*, d.lenom AS ledroit
          FROM utilisateur u
          INNER JOIN droit d ON u.droit_id = d.id
          WHERE u.lelogin = '$user' AND u.lepass = '$password';";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
        
    }else{
        
        return false;
        
    }
    
}