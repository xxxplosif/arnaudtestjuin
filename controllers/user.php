<?php

$liste_categories = getListCategory();

if(isset($_POST['user']) && isset($_POST['password'])){
    
    $user = secure($_POST['user']);
    
    $password = secure($_POST['password']);

    $_SESSION['user'] = connectUser($user, $password);
    
    $_SESSION['sid'] = session_id();
    
    if($_SESSION['user'] == false){
        
        $error_form_connection = 'Identifiants invalides !';
        
    }
    
}

// si on a envoyé le formulaire et qu'un fichier est bien attaché
if(isset($_POST['letitre'])&&isset($_FILES['lefichier'])){
    
    // traitement des chaines de caractères
    $letitre = secure($_POST['letitre']);
    $ladesc = secure($_POST['ladesc']);
    
    // récupération des paramètres du fichier uploadé
    $limage = $_FILES['lefichier'];

    // appel de la fonction d'envoi de l'image, le résultat de la fonction est mise dans la variable $upload
    $upload = upload_originales($limage,$dossier_ori,$formats_acceptes);
    
    // si $upload n'est pas un tableau c'est qu'on a une erreur
    if(!is_array($upload)){
        // on affiche l'erreur
        $error_upload_image = $upload;
        
    // si on a pas d'erreur, on va insérer dans la db et créer la miniature et grande image   
    }else{
        // création de la grande image qui garde les proportions
        $gd_ok = creation_img($dossier_ori, $upload['nom'],$upload['extension'],$dossier_gd,$grande_large,$grande_haute,$grande_qualite);
        
        // création de la miniature centrée et coupée
        $min_ok = creation_img($dossier_ori, $upload['nom'],$upload['extension'],$dossier_mini,$mini_large,$mini_haute,$mini_qualite,false);
        
        // si la création des 2 images sont effectuées
        if($gd_ok==true && $min_ok==true){
            
            // exécution de la requête (on utilise un tableau venant de la fonction upload_originales, de champs de formulaires POST traités et d'une variable de session comme valeurs d'entrée)
            
            // v. in models
            
            insertPhoto($upload['nom'],
                        $upload['extension'],
                        $upload['poids'],
                        $upload['hauteur'],
                        $upload['largeur'],
                        $letitre,
                        $ladesc,
                        $_SESSION['user']['id']);
            
            $msg_image_uploaded = 'L\'image a bien été envoyée !';
            
        }else{
            $error_upload_image = 'Erreur lors de l\'envoi de fichier';
        }
        
    }    
}