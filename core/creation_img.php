<?php

/*
 * 
 * Fonction qui crée les images en .jpg proportionelles ou coupées avec centrage avec comme paramètres:
 * creation_img("chemin vers l'originales",
 *  "nom complet du fichier originale sans extension",
 *  "extension de l'originale",
 *  "dossier de destination",
 *  "largeur en pixel maximum de l'image",
 *  "hauteur maximale en pixel de l'image",
 *  "Qualitée jpeg de 0 à 100",
 *  "Proportion (true par défaut), garde les proportions, mettre false si on souhaite centrer l'image et la couper");
 * 
 */

function creation_img($chemin_org, $nom,$extension,$destination,$largeur_max,$hauteur_max,$qualite, $proportion = true){
    
    // chemin + nom + '.' + extension de l'image à traitée
   $chemin_image = $chemin_org.$nom.'.'.$extension;
    
    // récupération des paramètres de l'images
    $param_image = getimagesize($chemin_image);
    
    // récupération de la largeur et de la hauteur d'origine en pixel
    $largeur_org = $param_image[0];
    $hauteur_org = $param_image[1];
    
    // calcul du ratio largeur originale avec la largeur maximale
    $ratio_l = $largeur_org / $largeur_max;
    // calcul du ratio hauteur originale avec la heuteur maximale
    $ratio_h = $hauteur_org / $hauteur_max;

    
    // création de l'image temporaire suivant le format
    switch ($extension){
        case 'jpg':
            $image_finale = imagecreatefromjpeg($chemin_image);
            
            break;
        
        case 'png':
            $image_finale = imagecreatefrompng($chemin_image);

            break;
        default:
            return false;
    }
    
    /*
     * Si on veut respecter le ratio
     */
    if($proportion==true){
    
        // on vérifie si un ratio est plus grand que l'autre (L > H)
    if($ratio_l>$ratio_h){
        
        // si la largeur originale est plus petite que largeur maximale on va garder la taille d'origine en Largeur mais aussi en hauteur!
        if($ratio_l < 1){
            $largeur_dest = $largeur_org;
            $hauteur_dest = $hauteur_org;
        }else{
            // on donne la largeur maximale comme référence
            $largeur_dest = $largeur_max;
            // on calcule la hauteur grâce au ratio de large
            $hauteur_dest = round($hauteur_org/$ratio_l);
        }
        
    // sinon (le ratio hauteur est plus grand ou égale au ratio largeur)   
    }else{
        // si la hauteur originale est plus petite que hauteur maximale on va garder la taille d'origine en hauteur mais aussi en largeur!
        if($ratio_h < 1){
            $largeur_dest = $largeur_org;
            $hauteur_dest = $hauteur_org;
        }else{
            // on calcule la largeur grâce au ratio de haut
            $largeur_dest = round($largeur_org/$ratio_h);
            // on donne la hauteur maximale comme référence
            $hauteur_dest = $hauteur_max;
        }
    }    
        
    // création d'une image vide aux bonnes dimensions dans laquelle ou colera l'image d'origine 
    $nouvelle_image = imagecreatetruecolor($largeur_dest, $hauteur_dest);

    
    // copie de l'image d'origine vers l'image finale
   imagecopyresampled($nouvelle_image, $image_finale, 0, 0, 0, 0, $largeur_dest, $hauteur_dest, $largeur_org, $hauteur_org);

    
    /*
     * Si on veut créer un fichier avec crop centré
     */
    }else{
    
      //$chemin_org, $nom,$extension,$destination,$largeur_max,$hauteur_max,$qualite, $proportion = true  
        
    // REFAIRE LE CALCUL
    if($ratio_l>$ratio_h){
        

            // on calcule la largeur grâce au ratio de haut
            $largeur_dest = round($largeur_org/$ratio_h);
            // on donne la hauteur maximale comme référence
            $hauteur_dest = $hauteur_max;
            $centre_large = round(($largeur_dest-$largeur_max)/2);
            $centre_haut = 0;
            
        
    // sinon (le ratio hauteur est plus grand ou égale au ratio largeur)   
    }else{
        // si la hauteur originale est plus petite que hauteur maximale on va garder la taille d'origine en hauteur mais aussi en largeur!
 
            // on donne la largeur maximale comme référence
            $largeur_dest = $largeur_max;
            // on calcule la hauteur grâce au ratio de large
            $hauteur_dest = round($hauteur_org/$ratio_l);
            $centre_large = 0;
            $centre_haut = round(($hauteur_dest-$hauteur_max)/2);
            
        }
     
     // création d'une image provisoire avant le crop
    $img_temp = imagecreatetruecolor($largeur_dest, $hauteur_dest);    
    // copie de l'image d'origine vers l'image finale
   imagecopyresampled($img_temp, $image_finale, 0, 0, 0, 0, $largeur_dest, $hauteur_dest, $largeur_org, $hauteur_org);    
        
        
    
    // création d'une image vide aux dimensions fixes passées à la fonction
    $nouvelle_image = imagecreatetruecolor($largeur_max, $hauteur_max);    
    // copie de l'image d'origine vers l'image finale
   imagecopyresampled($nouvelle_image, $img_temp, 0, 0, $centre_large, $centre_haut, $largeur_dest, $hauteur_dest, $largeur_dest, $hauteur_dest);    
    // destruction de l'image temporaire pré-crop
   imagedestroy($img_temp);
    }
    
    // création de l'image finale en .jpg dans le dossier de destination avec la qualité passée en paramètre
    imagejpeg($nouvelle_image, $destination.$nom.'.jpg', $qualite);
    // destruction de l'image temporaire
    imagedestroy($nouvelle_image);

    
    return true;
}