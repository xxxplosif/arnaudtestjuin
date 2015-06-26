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

<h3>Nous contacter</h3>

<form action="./?page=contact" method="POST" class="contact">
    
    <table>
    
        <tr>
            <td><label for="titre">Titre</label></td>
            <td><input type="text" id="titre" name="titre" required /></td>
        </tr>

        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" id="nom" name="nom" required=""/></td>
        </tr>
    
        <tr>
            <td><label for="prenom">Prénom</label></td>
            <td><input type="text" id="prenom" name="prenom"/></td>
        </tr>
    
        <tr>
            <td><label for="email">E-mail</label></td>
            <td><input type="email" id="email" name="email" required /></td>
        </tr>
        
        <tr>
            <td><label for="message">Message</label></td>
            <td><textarea maxlength="500" name="message" id="message" cols="30" rows="10" required></textarea></td>
        </tr>
    
        <tr>
            <td><input type="submit" value="Envoyer" name="submitmessage" /></td>
            <td>
                <?php if(isset($msg)) echo '<span style="color:darkblue;">'.$msg.'</span>'; ?>
                <?php if(isset($error)) echo '<span style="color:red;">'.$error.'</span>'; ?>
            </td>
        </tr>
    
    </table>
    
</form>

<?php

$content = ob_get_clean();

require 'template/master.php';
