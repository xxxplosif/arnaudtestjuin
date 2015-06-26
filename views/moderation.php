<?php

ob_start();

?>

<p>Bienvenue <?php echo $_SESSION['user']['lenom'] ?>. Vous êtes connecté en tant que <?php echo $_SESSION['user']['ledroit'] ?> sur votre espace Modérateur</p>

<hr />

<?php

for($i=0;$i<count($liste_photos);$i++){
    
    ?>
    
    <a href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" target="_blank">
    
    <div class="mini">
    
        <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>
       
        <img  src="./images/miniatures/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" />
    
        <p><?php echo $liste_photos[$i]['ladesc']; ?></p>
        
        <pre>Par : <?php echo $liste_photos[$i]['lelogin']; ?></pre>

    </div></a>
    
    <?php
    
}

$content = ob_get_clean();

require 'template/master.php';
