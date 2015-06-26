<?php

ob_start();

echo '<h3>';

if(count($results) > 0){
    echo count($results)." résultats pour \"$search\"";
}else{
    echo "Pas de résultats pour \"$search\"";
}

echo '</h3><hr />';

for($i=0;$i<count($results);$i++){
    
    ?>
    
    <div class="mini">
    
        <h4><?php echo $results[$i]['letitre']; ?></h4>
       
        <a rel="prettyPhoto[gallery]" href="./images/affichees/<?php echo $results[$i]['lenom']; ?>.jpg" >
            <img  src="./images/miniatures/<?php echo $results[$i]['lenom']; ?>.jpg" />
        </a>
        
        <p><?php echo $results[$i]['ladesc']; ?></p>
        
        <pre>Par : <?php echo $results[$i]['lelogin']; ?></pre>

    </div>
    
    <?php
    
}

$content = ob_get_clean();

require 'template/master.php';
