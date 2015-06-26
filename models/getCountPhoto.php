<?php

function getCountPhoto(){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "SELECT COUNT(*) AS nb FROM photo p
          INNER JOIN utilisateur u ON p.utilisateur_id = u.id  ";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
            
    }else{
        
        return false;
        
    }
    
}
