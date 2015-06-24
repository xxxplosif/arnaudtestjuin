<?php

$liste_categories = getListCategory();

if(isset($_POST['user']) && isset($_POST['password'])){
    
    $user = secure($_POST['user']);
    
    $password = secure($_POST['password']);

    $_SESSION['user'] = connectUser($user, $password);
    
}