<?php

function getListPhoto(){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    // currently building, pending status
    
    $q = 'SELECT * FROM photo';
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        $array = [];
        
        while ($row = mysqli_fetch_assoc($q)){
            
            $array[] = $row;
            
        }
        
        return $array;
        
    }else{
        
        return false;
        
    }
    
}
