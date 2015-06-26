<?php

function deletePhoto($id_image){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "DELETE FROM photo WHERE id = $id_image";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}
