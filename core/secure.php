<?php

function secure($get_variable){
    
    $safe_variable = htmlentities(strip_tags(trim($get_variable)), ENT_QUOTES);
    
    return $safe_variable;
    
}