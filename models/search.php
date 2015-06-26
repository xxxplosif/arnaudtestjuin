<?php

function search($keyphrase){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "  SELECT p.*, u.lelogin AS lelogin FROM photo p
            INNER JOIN utilisateur u ON p.utilisateur_id = u.id
            WHERE letitre LIKE '%$keyphrase%'
            OR ladesc LIKE '%$keyphrase%'  ";
    
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