<?php

$liste_categories = getListCategory();

if(isset($_POST['user']) && isset($_POST['password'])){
    
    $user = secure($_POST['user']);
    
    $password = secure($_POST['password']);

    $_SESSION['user'] = connectUser($user, $password);
    
    if($_SESSION['user'] == false){
        
        $error_form_connection = 'Identifiants invalides !';
        
    }
    
}