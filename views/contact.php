<?php

ob_start();

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<p>Bienvenue sur la page de contact de Telepro-photos.fr !</p>

<hr />

<?php

else:
    
?>

<p>Bienvenue <?php echo $_SESSION['user']['lenom'] ?>. Vous êtes connecté en tant que <?php echo $_SESSION['user']['ledroit'] ?></p>

<hr />

<?php
    
endif;  

?>

<form action="./?page=contact" method="POST">
    
    
    <label for="titre">Titre : </label>
    <input type="text" id="titre" name="titre" required /><br />
    
    <label for="nom">Nom : </label>
    <input type="text" id="nom" name="nom" required=""/><br />
    
    <label for="prenom">Prénom : </label>
    <input type="text" id="prenom" name="prenom"/><br />
    
    <label for="email">E-mail : </label>
    <input type="email" id="email" name="email" required /><br />
    
    <label for="message">Message : </label>
    <textarea maxlength="500" name="message" id="message" cols="30" rows="10" required></textarea><br />
    
    <input type="submit" value="Envoyer" name="submitmessage" />
    
    <?php if(isset($msg)) echo '<span style="color:darkblue;">'.$msg.'</span>'; ?>
    <?php if(isset($error)) echo '<span style="color:red;">'.$error.'</span>'; ?>
    
</form>


<?php

$content = ob_get_clean();

require 'template/master.php';
