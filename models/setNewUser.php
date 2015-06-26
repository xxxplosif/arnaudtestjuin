<?php

function setNewUser($nom,$login,$email,$password,$ledroit){
    
    global $connect; if(!isset($connect)) { $connect = connect(DB_SERVER, DB_USER, DB_MDP, DB_NAME); }
    
    $q = "INSERT INTO utilisateur (lelogin, lepass, lemail,lenom,droit_id) 
	  VALUES ('$login','$password','$email','$nom',$ledroit);";
    
    $q = mysqli_query($connect, $q);
    
    if($q){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}