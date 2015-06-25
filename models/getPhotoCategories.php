<?php

function getPhotoCategories($id_photo){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  SELECT p.*, GROUP_CONCAT(r.id) AS idrub, GROUP_CONCAT(r.lintitule SEPARATOR '|||' ) AS lintitule
            FROM photo p
            
            LEFT JOIN photo_has_rubrique h ON h.photo_id = p.id
            INNER JOIN rubrique r ON h.rubrique_id = r.id
            
            WHERE p.utilisateur_id = ".$_SESSION['user']['id']." 
                AND p.id = $id_photo
            
            GROUP BY p.id
            ORDER BY p.id DESC;  ";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return mysqli_fetch_assoc($q);
            
    }else{
        
        return false;
        
    }
    
}
