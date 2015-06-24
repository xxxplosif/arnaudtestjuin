<?php

ob_start();

?>

affichage des 20 dernières photos de tous les utilisateurs en miniature avec un lien target blank sur chaque

message de bienvenue

<?php

$content = ob_get_clean();

require 'template/master.php';