<?php

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id() || $_SESSION['user']['laperm'] != 1){
      
    header('Location: ./?page=deconnect');
     
}

$liste_categories = getListCategory();

$liste_photos = getListPhoto();
