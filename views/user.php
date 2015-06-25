<?php

ob_start();

if(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<form action="" method="POST">
    <label for="user">Utilisateur : </label>
    <input type="text" id="user" name="user" />
    <label for="password">Mot de passe : </label>
    <input type="password" id="password" name="password" />
    <input type="submit" value="Se connecter" />
    <?php if(isset($error_form_connection)) echo '<span style="color:red;">'.$error_form_connection.'</span>'; ?>
</form>

<?php

elseif(!isset($action) || $action != 'edit'):

echo '<p>Bienvenue ' . $_SESSION['user']['lenom'] . '. Vous êtes connecté en tant que '. $_SESSION['user']['ledroit'] . '.</p><hr />';

if(isset($editerror)) echo $editerror;

?>

<h3>Charger une nouvelle image</h3>

<form action="" method="POST" enctype="multipart/form-data">
    
    <label for="letitre">Titre du fichier</label>
    <input type="text" id="letitre" name="letitre" required/><br /><br />
    
    <!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>-->
    
    <label for="lefichier">Fichier</label>
    <input type="file" id="lefichier" name="lefichier" required/><br/><br />
    
    <label for="ladesc">Description</label><br/>
    <textarea id="ladesc" name="ladesc"></textarea><br/><br/>
    
    <label>Catégories</label><br/><br/>
        <?php 
        
        echo '<table>';
        
        foreach($liste_categories as $value){
            
            echo "<tr><td>{$value['lintitule']}</td><td><input type=\"checkbox\" name=\"category[]\" value=\"{$value['id']}\" /></td></tr>";
            
        }
        
        echo '</table>'
        
        ?>
    
    <br />
    <input type="submit" value="Envoyer le fichier" />  
    
    <?php if(isset($error_upload_image)) echo '<span style="color:red;">'.$error_upload_image.'</span>'; ?>
    
    <?php if(isset($msg_image_uploaded)) echo '<span style="color:darkblue;">'.$msg_image_uploaded.'</span>'; ?>
    
</form>

<h3>Mes photos</h3>

<?php

// pagination

echo '<p>'.pagination(getCountPhotoByUser($_SESSION['user']['id'])['nb'],$pos).'</p>';

// for loop display photos

for($i=0;$i<count($liste_photos);$i++){
    
?>

<div class="mini">

    <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>

    <a href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" target="_blank">
        <img  src="./images/miniatures/<?php echo $liste_photos[$i]['lenom']; ?>.jpg" />
    </a>
    
    <p><?php echo $liste_photos[$i]['ladesc']; ?></p>

    <pre>Par : <?php echo $liste_photos[$i]['lelogin']; ?></pre>
    
    <a 
        href="./?page=user&action=delete&id=<?php echo $liste_photos[$i]['id']; ?>"
        onclick="return parachute('Êtes-vous sûr de vouloir supprimer &quot;<?php echo $liste_photos[$i]['letitre']; ?>&quot; ?')"
    ><img src="./images/common/delete.png"/></a>
    
    <a href="./?page=user&action=edit&id=<?php echo $liste_photos[$i]['id']; ?>"><img src="./images/common/edit.png"/></a>
    
    <?php 

    $categories = explode('|||', getPhotoCategories($i)['lintitule']);
    
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

    echo '<p>Bienvenue ' . $_SESSION['user']['lenom'] . '. Vous êtes connecté en tant que '. $_SESSION['user']['ledroit'] . '.</p><hr />';
    
?>    



<form action="./?page=user&action=treatedit&id=<?php echo $photo['id']; ?>" method="POST">
    
    <label for="letitre">Titre :</label>
    <input type="text" id="letitre" name="letitre" value="<?php echo $photo['letitre']; ?>" required/><br />

    <label for="ladesc">Description :</label><br />
    <textarea name="ladesc" id="ladesc" cols="30" rows="10" required><?php echo $photo['ladesc']; ?></textarea><br />
    
    <input type="submit" value="Modifier"/>
    
</form>

    
<?php


endif;

$content = ob_get_clean();

require 'template/master.php';