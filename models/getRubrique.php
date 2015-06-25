<?php

function getRubrique($id_rub){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  SELECT * FROM rubrique
            WHERE id = $id_rub  ";

    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
            
    }else{
        
        return false;
        
    }
    
}