<?php

/*
 * 
 * Fonction d'upload de l'image d'origine, renvoie un tableau si réussie sinon renvoie une chaine de caractère contenant l'erreur
 * Utilisation: upload_originales("$_FILE","url du dossier","tableau avec les extensions permises");
 *  
 */

function upload_originales($fichier,$destination,$ext){
    
    $sortie = array();
    
    // récupération du nom d'origine
    $nom_origine = $fichier['name'];
    
    // récupération de l'extension du fichier mise en minuscule et sans le .
    $extension_origine = substr(strtolower(strrchr($nom_origine,'.')),1);
    
    // si l'extension ne se trouve pas (!) dans le tableau contenant les extensions autorisées
    if(!in_array($extension_origine,$ext)){
        
        // envoi d'une erreur et arrêt de la fonction
        return "Erreur : Extension non autorisée";
        
    }
    
    // si l'extension est valide mais de type jpeg
    if($extension_origine==="jpeg"){ $extension_origine = "jpg"; }
    
    // création du nom final  (appel de la fonction chaine_hasard, pour la chaine de caractère aléatoire)
    $nom_final = chaine_hasard(25);
    
    // on a besoin du nom final dans le tableau $sortie si la fonction réussit
    $sortie['poids'] = filesize($fichier['tmp_name']);
    $sortie['largeur'] = getimagesize($fichier['tmp_name'])[0];
    $sortie['hauteur'] = getimagesize($fichier['tmp_name'])[1];
    $sortie['nom'] = $nom_final;
    $sortie['extension'] = $extension_origine;
    

    // on déplace l'image du dossier temporaire vers le dossier 'originales'  avec le nom de fichier complet
    if(@move_uploaded_file($fichier['tmp_name'], $destination.$nom_final.".".$extension_origine)){
        return $sortie;
    // si erreur
    }else{
        return "Erreur lors de l'upload d'image";
    }
    
}