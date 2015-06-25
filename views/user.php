<?php

ob_start();

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<form action="" method="POST">
    <label for="user">Utilisateur : </label>
    <input type="text" id="user" name="user" />
    <label for="password">Mot de passe : </label>
    <input type="password" id="password" name="password" />
    <input type="submit" value="Se connecter" />
    <?php if(isset($error_form_connection)) echo '<span style="color:red;">'.$error_form_connection.'</span>'; ?>
</form>

<?php

else:

echo '<p>Bienvenue ' . $_SESSION['user']['lenom'] . '. Vous êtes connecté en tant que '. $_SESSION['user']['ledroit'] . '.</p><hr />';

?>

<h3>Charger une nouvelle image</h3>

<form action="" method="POST" enctype="multipart/form-data">
    
    <label for="letitre">Titre du fichier</label>
    <input type="text" id="letitre" name="letitre" required/><br /><br />
    
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    
    <label for="lefichier">Fichier</label>
    <input type="file" id="lefichier" name="lefichier" required/><br/><br />
    
    <label for="ladesc">Description</label><br/>
    <textarea id="ladesc" name="ladesc"></textarea><br/><br />
    
    <input type="submit" value="Envoyer le fichier" />  
    
    <?php if(isset($error_upload_image)) echo '<span style="color:red;">'.$error_upload_image.'</span>'; ?>
    
    <?php if(isset($msg_image_uploaded)) echo '<span style="color:darkblue;">'.$msg_image_uploaded.'</span>'; ?>
    
</form>

<h3>Mes photos</h3>

<?php

// pagination

echo '<p>'.pagination(getCountPhotoByUser($_SESSION['user']['id'])['nb'],$pos).'</p>';

// for loop display photos

for($i=0;$i<count($liste_photos);$i++){
    
?>

<div class="mini">

    <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>

    <a href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" target="_blank">
        <img  src="./images/miniatures/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" />
    </a>
    
    <p><?php echo $liste_photos[$i]['ladesc']; ?></p>

    <pre>Par : <?php echo $liste_photos[$i]['lelogin']; ?></pre>

    <a href="./?page=user&action=delete&id=<?php echo $liste_photos[$i]['id']; ?>"><img src="./images/common/delete.png"/></a>
    
    <a href="./?page=user&action=edit&id=<?php echo $liste_photos[$i]['id']; ?>"><img src="./images/common/edit.png"/></a>
    
</div>

<?php
    
}

endif;

$content = ob_get_clean();

require 'template/master.php';