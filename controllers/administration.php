<?php

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id() || $_SESSION['user']['laperm'] != 0){
      
    header('Location: ./?page=deconnect');
     
}

$liste_categories = getListCategory();

// treat edit and delete

if(isset($_GET['id']) && ctype_digit($_GET['id'])){

    $action_photo = $_GET['id'];

    $photo = getPhoto($action_photo);

    // action

    if(isset($_GET['action'])){

        $action = secure($_GET['action']);

        $autorized_actions = array('edit','delete','treatedit');

        if(in_array($action, $autorized_actions)){

            // do nothing for edit and delete

            // but treat treatedit and treatdelete

            if($action == 'treatedit'){

                if(isset($_POST['letitre']) && isset($_POST['ladesc'])){

                    $letitre = secure($_POST['letitre']);
                    $ladesc  = secure($_POST['ladesc']);

                    unbindPhotoCategory($photo['id']);

                    if(isset($_POST['category']) && is_array($_POST['category'])){

                        $category = $_POST['category'];

                    }else{

                        $category = [];

                    }

                    foreach ($category as $value){

                        bindPhotoCategory($photo['id'],$value);

                    }

                    $update_photo = updatePhoto($photo['id'], $letitre, $ladesc);

                    if($update_photo == false){

                        $editerror = 'La modification a échoué !';

                    }

                    // errors ? stack in a variable and show them

                }else{

                    header('Location: ./?page=deconnect');

                }

            }elseif($action == 'delete'){

                unbindPhotoCategory($photo['id']);

                deletePhoto($photo['id']);

                unlink(CHEMIN_RACINE.$dossier_ori.$photo['lenom'].'.'.$photo['lextension']);

                unlink(CHEMIN_RACINE.$dossier_gd.$photo['lenom'].'.jpg');

                unlink(CHEMIN_RACINE.$dossier_mini.$photo['lenom'].'.jpg');

            }

        }else{

            header('Location: ./?page=deconnect');

        }

    }else{

        header('Location: ./?page=deconnect');

    }

}

// pagination
    
if(isset($_GET['pos'])){ 

    $pos = secure($_GET['pos']);

}else{

    $pos = 1;

}

$from = ($pos -1)*20;

$liste_photos = getListPhoto($from);