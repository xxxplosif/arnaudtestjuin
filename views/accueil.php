<?php

ob_start();

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<p>Bienvenue sur Telepro-photos.fr !</p>

<hr />

<?php

else:

    echo '<p>Bienvenue ' . $_SESSION['user']['lenom'] . '. Vous êtes connecté en tant que '. $_SESSION['user']['ledroit'] . '.</p><hr />';



endif;

?>
affichage des 20 dernières photos de tous les utilisateurs en miniature avec un lien target blank sur chaque



<?php

$content = ob_get_clean();

require 'template/master.php';