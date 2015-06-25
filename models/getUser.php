<?php

function getUser($user_id){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  SELECT * FROM utilisateur
            WHERE utilisateur.id = $user_id  ";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
        
    }else{
        
        return false;
        
    }
    
}