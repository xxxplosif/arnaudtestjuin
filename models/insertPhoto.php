<?php

function insertPhoto($lenom,$letype,$lepoids,$lahauteur,$lalargeur,$letitre,$ladesc,$utilisateur_id){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "INSERT INTO photo (lenom,lextension,lepoids,lalargeur,lahauteur,letitre,ladesc,utilisateur_id) 
	  VALUES ('$lenom','$letype',$lepoids,$lalargeur,$lahauteur,'$letitre','$ladesc',$utilisateur_id);";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}