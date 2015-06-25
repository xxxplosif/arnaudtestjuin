<?php

$liste_categories = getListCategory();

if(isset($_GET['id']) && ctype_digit($_GET['id'])){
    
    $id = $_GET['id'];
    
    $rubrique = getRubrique($id);
    
    if($rubrique == false){
        
        header('Location: ./?page=deconnect');
        
    }
    
}else{
    
    header('Location: ./?page=deconnect');
    
}



