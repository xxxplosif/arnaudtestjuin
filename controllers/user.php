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


if(isset($_GET['action'])){
    
    $action = secure($_GET['action']);
    
    $autorized_actions = array('inscription','oubli','submitinscription');
    
    if(in_array($action, $autorized_actions)){
        
        
        if(isset($_POST['submitinscription'])){
            
            if(isset($_POST['nom']) &&  isset($_POST['login']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email'])) {
                   
                   $nom = secure($_POST['nom']);
                   $login = secure($_POST['login']);
                   $pass1 = secure($_POST['pass1']);
                   $pass2 = secure($_POST['pass2']);
                   $email = secure($_POST['email']);
                   
                   if($pass1 == $pass2){
                       
                       if(setNewUser($nom,$login,$email,$pass1,3)){
                           
                           $iscriptionok = 'Félicitation, vous pouvez dès à présent vous connecter sur votre espace client !';
                           
                       }else{
                           
                           $iscriptionerror =  'Veuillez saisir le même mot de passe deux fois !';
                           
                       }
                       
                   }else{
                       
                       $iscriptionerror = 'Veuillez saisir le même mot de passe deux fois !';
                       
                   }
                   
             
            }else{
                
                $iscriptionerror = 'Veuillez remplir tous les champs !';
                
            }
            
        }    
            
        if(isset($_POST['submitoubli'])){
            
            if(isset($_POST['email'])) {
                
                $email = secure($_POST['email']);
                
                $utilisateur = getUserByMail($email);
                
                if($utilisateur != false){
                    
                    $entete = "From: webmaster@telepro.fr \r\n".
                              "Reply-To: webmaster@telepro.fr \r\n".
                              "X-Mailer: PHP/".phpversion();
                    
                    if(mail($email, 'Mot de passe telepro photos',$utilisateur['lepass'],$entete)){
                        
                        $oubliok = 'Un email vous a été envoyé avec votre mot de passe';
                        
                    }else{
                        
                        $oublierror = 'Échec de l\'envoi de l\'email';
                        
                    }
                    
                }else{
                    
                    $oublierror = 'Mauvaise adresse email ou bien vous n\'avez pas de compte chez nous';
                    
                }
                
                
            }else{
                
                $oublierror = 'Veuillez rentrer une adresse e-mail !';
                
            }
            
        }
        
    }else{
        
        header('Location: ./?page=deconnect');
        
    }
    
}



if(isset($_SESSION['user']) && $_SESSION['sid'] == session_id()):

    if(isset($_GET['id']) && ctype_digit($_GET['id'])){
        
        $action_photo = $_GET['id'];
        
        $photo = getPhoto($action_photo);
        
        if($photo['utilisateur_id'] == $_SESSION['user']['id']){
            
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
           
            
        }else{
            
            header('Location: ./?page=deconnect');
            
        }
        
    }
    
// photo upload
    
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
            
            $id_newimage =  insertPhoto($upload['nom'],
                            $upload['extension'],
                            $upload['poids'],
                            $upload['hauteur'],
                            $upload['largeur'],
                            $letitre,
                            $ladesc,
                            $_SESSION['user']['id']);

            if($id_newimage != false){
                
                if(isset($_POST['category']) && is_array($_POST['category'])){
                    
                    $category = $_POST['category'];
                    
                }else{
                    
                    $category = [];
                    
                }
                
                foreach ($category as $value){
                    
                bindPhotoCategory($id_newimage,$value);
                    
                }
            
                $msg_image_uploaded = 'L\'image a bien été envoyée !';
                
            }else{
                
                $error_upload_image = 'Erreur lors de l\'envoi de fichier';
                
            }
            
        }else{
            
            $error_upload_image = 'Erreur lors de l\'envoi de fichier';
            
        }
        
    }    
}

// pagination
    
    if(isset($_GET['pos'])){ 
        
        $pos = secure($_GET['pos']);
        
    }else{
        
        $pos = 1;
        
    }
    
    $from = ($pos -1)*20;
    
    $liste_photos = getListPhotoByUser($_SESSION['user']['id'],$from);

endif;