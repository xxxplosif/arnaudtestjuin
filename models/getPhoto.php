<?php

function getPhoto($id_photo){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "SELECT * FROM photo 
          WHERE id = $id_photo";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
        
    }else{
        
        return false;
        
    }
    
}
