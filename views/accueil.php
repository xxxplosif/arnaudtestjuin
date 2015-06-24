<?php

ob_start();

?>

affichage des 20 dernières photos de tous les utilisateurs en miniature avec un lien target blank sur chaque

<?php

$content = ob_get_clean();

require 'template/master.php';