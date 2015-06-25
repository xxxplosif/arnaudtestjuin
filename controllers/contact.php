<?php

$liste_categories = getListCategory();

// email

if(isset($_POST['submitmessage'])):

if(isset($_POST['titre']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])){
    
    $titre = secure($_POST['titre']);
    $nom = secure($_POST['nom']);
    $email = secure($_POST['email']);
    $message = secure($_POST['message']);
    
    if(isset($_POST['prenom'])){
        
        $prenom = secure($_POST['prenom']);
        
    }
    
    if(!empty($titre) && !empty($nom) && !empty($email) && !empty($message)){

        $destinataire = getUser(1)['lemail'];

        $send_message =  "Titre : "                         .$titre.     "\r\n";
        
        if(isset($prenom)){
        $send_message .=  "Prénom de l'expéditeur : "        .$prenom.    "\r\n";
        }
        
        $send_message .= "Nom de l'expéditeur : "           .$nom.       "\r\n";
        $send_message .= "Adresse email de l'expéditeur : " .$email.     "\r\n";
        $send_message .= "Message : "                       .$message.   "\r\n";

        utf8_encode($send_message);
        
        $demande = 'demande';
        
        $entete = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n".
        'X-Mailer: PHP/'.phpversion();
        
        
        if (mail($destinataire,$demande,$send_message,$entete)){     
            
            $msg = "E-mail envoyé !";

        }else{
            
            $error = "Erreur à l'envoi !";

        }
        
        
    }else{
        
        $error = 'Veuillez remplir tous les champs !';
        
    }
    
    
    
}else{
    
    $error = 'Veuillez remplir tous les champs !';
    
}

endif;