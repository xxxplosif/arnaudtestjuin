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

for($i=0;$i<count($liste_photos);$i++){
    
    echo "<a href=\"./images/affichees/{$liste_photos[$i]['lenom']}.jpg\" target=\"_blank\">";
    
    echo "<div class=\"mini\" >
          <h4>{$liste_photos[$i]['letitre']}</h4>";
    
    echo "<img  src=\"./images/miniatures/{$liste_photos[$i]['lenom']}.jpg\" alt=\"\" />";
    
    echo "<p>{$liste_photos[$i]['ladesc']}</p>";
    
    echo "<pre>Par : {$liste_photos[$i]['lelogin']}</pre>";
    
    echo '</div>';
    
    echo '</a>';
}

$content = ob_get_clean();

require 'template/master.php';