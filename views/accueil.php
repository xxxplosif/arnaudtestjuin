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
    
    ?>
    
    <div class="mini">
    
        <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>
        
        <a rel="prettyPhoto[gallery]" href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg">
            <img  src="./images/miniatures/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" />
        </a>
        
        <p><?php echo $liste_photos[$i]['ladesc']; ?></p>
        
        <pre>Par : <?php echo $liste_photos[$i]['lelogin']; ?></pre>

    </div>
    
    <?php
    
}

$content = ob_get_clean();

require 'template/master.php';