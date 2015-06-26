<?php

$liste_categories = getListCategory();

if(isset($_POST['q'])){
    
    $search = secure($_POST['q']);
    
}else{
    
    header('Location: ./');
    
}

$results = search($search);