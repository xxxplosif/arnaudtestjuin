<?php

/*
 * fonction de pagination avec comme argument : 
 * 
 * pagination(int => nombre total d'articles [obligatoire], 
 *            int => page actuelle commence par 1 [1 comme valeur par défaut],
 *            int => nombre d'articles par page [défaut = 5], 
 *            string => nom de la variable get [défaut = "pg"]
 * )
 */

function pagination($total, $page_actu = 1, $par_pg = 10, $page, $mng, $var_get = "pg") {
    $nombre_pg = ceil($total / $par_pg);
    if ($nombre_pg > 1) {
        $sortie = "Page ".$page_actu." ";
        for ($i = 1; $i <= $nombre_pg; $i++) {
            if ($i == 1) {
                if ($i == $page_actu) {
                    $sortie.= "<< < ";
                } else {
                    $sortie.= "<a href='?page=$page&mng=$mng&$var_get=$i'><<</a> <a href='?page=$page&mng=$mng&$var_get=" . ($page_actu - 1) . "'><</a> ";
                }
            }
            if ($i != $page_actu) {
                $sortie .= "<a href='?page=$page&mng=$mng&$var_get=$i'>$i</a>";
            } else {
                $sortie .= " $i ";
            }
            if ($i != $nombre_pg) {
                $sortie.= " - ";
            } else {
                if ($i == $page_actu) {
                    $sortie.=" > >>";
                } else {
                    $sortie.= " <a href='?page=$page&mng=$mng&$var_get=" . ($page_actu + 1) . "'>></a> <a href='?page=$page&mng=$mng&&$var_get=$nombre_pg'>>></a> ";
                }
            }
        }
        return $sortie;
    } else {
        return "Page 1";
    }
}