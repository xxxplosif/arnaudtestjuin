<?php

function getCountRubriquePhoto($id_rub){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "SELECT COUNT(*) AS nb FROM photo p
          INNER JOIN photo_has_rubrique h ON p.id = h.photo_id
          INNER JOIN rubrique r ON h.rubrique_id = r.id
          WHERE r.id = $id_rub
            ";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
            
    }else{
        
        return false;
        
    }
    
}
