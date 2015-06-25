<?php

function getListPhotoByRubrique($id_rub,$from){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  SELECT p.*, u.lelogin AS lelogin 
            FROM photo p 
            
            INNER JOIN utilisateur u ON p.utilisateur_id = u.id
            INNER JOIN photo_has_rubrique h ON p.id = h.photo_id
            INNER JOIN rubrique r ON h.rubrique_id = r.id 
            WHERE r.id = $id_rub
            LIMIT $from, 20 ";

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
