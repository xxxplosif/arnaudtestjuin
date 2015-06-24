<?php

if(isset($_GET['page'])){
    
    $page = secure($_GET['page']);
    
}elseif(isset($_POST['page'])){
    
    $page = secure($_POST['page']); 
    
}else{
    
    $page="accueil";
    
}