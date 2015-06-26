<?php

ob_start();

?>

<p>Bienvenue <?php echo $_SESSION['user']['lenom'] ?>. Vous êtes connecté en tant que <?php echo $_SESSION['user']['ledroit'] ?> sur votre espace Administrateur</p>

<hr />

<?php

if(!isset($action) || $action != 'edit'):

// pagination

echo '<p>'.pagination(getCountPhoto()['nb'],$pos,20,"page=administration&pos").'</p>';

for($i=0;$i<count($liste_photos);$i++){
    
?>

<div class="mini">

    <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>

    <a rel="prettyPhoto[gallery]" href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" >
        <img  src="./images/miniatures/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" />
    </a>
    
    <p><?php echo $liste_photos[$i]['ladesc']; ?></p>

    <pre>Par : <?php echo $liste_photos[$i]['lelogin']; ?></pre>
    
    <a 
        href="./?page=administration&action=delete&id=<?php echo $liste_photos[$i]['id']; ?>"
        onclick="return parachute('Êtes-vous sûr de vouloir supprimer &quot;<?php echo $liste_photos[$i]['letitre']; ?>&quot; ?')"
    ><img src="./images/common/delete.png"/></a>
    
    <a href="./?page=administration&action=edit&id=<?php echo $liste_photos[$i]['id']; ?>"><img src="./images/common/edit.png"/></a>
    
    <?php 
    
    $categories = explode('|||', getPhotoCategoriesAllUser($liste_photos[$i]['id'])['lintitule']);
    
    if(!empty($categories[0])){
        
        echo '<p>Catégories :</p>';
        
        foreach ($categories as $value){
            
            echo "<pre>- $value</pre>";
            
        }
        
    }
    
    ?>
    
</div>

<?php
    
}

elseif($action == 'edit'):
    
?>

<form action="./?page=administration&action=treatedit&id=<?php echo $photo['id']; ?>" method="POST">
    
    <label for="letitre">Titre</label><br />
    <input type="text" id="letitre" name="letitre" value="<?php echo $photo['letitre']; ?>" required/><br /><br />

    <label for="ladesc">Description</label><br />
    <textarea name="ladesc" id="ladesc" cols="30" rows="10" required><?php echo $photo['ladesc']; ?></textarea><br /><br />
    
    <label>Catégories</label><br /><br />
    
    <?php 

    $category = explode('|||', getPhotoCategoriesAllUser($photo['id'])['lintitule']);

    echo '<table>';
    
    foreach($liste_categories as $value1){
        
        echo   "<tr><td>{$value1['lintitule']}</td><td><input type=\"checkbox\" name=\"category[{$value1['id']}]\" value=\"{$value1['id']}\"";
        
        foreach ($category as $value2) {
            
            if($value1['lintitule'] == $value2){
                
                echo 'checked';
                
            }
            
        }
        
        echo "/></td></tr>";

    }
    
    echo '</table><br />';

    
    ?>
    
    
    <input type="submit" value="Modifier"/>
    
    <?php if(isset($editerror)) echo '<span style="color:red;">'.$editerror.'</span>'; ?>
    
</form>

<?php

endif;

$content = ob_get_clean();

require 'template/master.php';
