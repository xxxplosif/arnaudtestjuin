<?php

ob_start();

if(!isset($_SESSION['user'])):

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

<p>Charger un ficher</p>

<form action="" method="POST" enctype="multipart/form-data">
    
    <label for="up_file_title">Titre du fichier</label>
    <input type="text" id="up_file_title" name="up_file_title" required/>
    
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    
    <label for="up_file">Fichier</label>
    <input type="file" id="up_file" name="up_file" required/>
    
    <input type="submit" value="Envoyer le fichier" />  
    
</form>

<?php

endif;

$content = ob_get_clean();

require 'template/master.php';