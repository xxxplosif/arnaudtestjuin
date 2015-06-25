<?php

$liste_categories = getListCategory();

if(isset($_GET['id']) && ctype_digit($_GET['id'])){
    
    $id = $_GET['id'];
    
    $rubrique = getRubrique($id);
    
    if(isset($_GET['pos'])){ 
        
        $pos = secure($_GET['pos']);
        
    }else{
        
        $pos = 1;
        
    }
    
    $from = ($pos -1)*20;
    
    $liste_photos = getListPhotoByRubrique($id,$from);
    
    if($rubrique == false){
        
        header('Location: ./?page=deconnect');
        
    }
    
}else{
    
    header('Location: ./?page=deconnect');
    
}



