<?php

/*
 * 
 * renvoie une chaine au hasard de longueur égale au nombre passé en paramètre
 * appel => chaine_hasard(int);
 * 
 */

function chaine_hasard($nombre_caracteres){
    $caracteres = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,0,1,2,3,4,5,6,7,8,9";
    $tableau = explode(",", $caracteres);
    $nb_element_tab = count($tableau);
    $sortie ="";
    for($i=0;$i<$nombre_caracteres;$i++){
        $hasard = mt_rand(0, $nb_element_tab-1);
        $sortie .= $tableau[$hasard];
    }
    return $sortie;
}