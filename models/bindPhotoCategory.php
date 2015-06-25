<?php

function bindPhotoCategory($id_image,$id_category){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "INSERT INTO photo_has_rubrique (photo_id,rubrique_id) 
	  VALUES ($id_image,$id_category);";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}