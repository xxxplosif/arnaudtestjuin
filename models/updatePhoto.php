<?php

function updatePhoto($id_photo,$letitre,$ladesc){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  UPDATE photo SET 
            letitre = '$letitre', ladesc = '$ladesc'
            WHERE id = $id_photo";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}