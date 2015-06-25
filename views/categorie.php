<?php

ob_start();

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<p>Bienvenue sur Telepro-photos.fr ! - <?php echo $rubrique['lintitule']; ?></p>

<hr />

<?php

else:
    
?>

<p>Catégorie - <?php echo $rubrique['lintitule']; ?> - Bienvenue <?php echo $_SESSION['user']['lenom'] ?>. Vous êtes connecté en tant que <?php echo $_SESSION['user']['ledroit'] ?></p>

<hr />

<?php
    
endif;    

?>

ma pagination <br /><br />

affichage des 20 dernières photos de la rubrique

<?php

$content = ob_get_clean();

require 'template/master.php';