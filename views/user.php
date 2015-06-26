<?php

ob_start();

if(isset($action) && $action == 'inscription'):

?>

<p>S'inscrire</p>
<hr />

<form action="./?page=user&action=inscription" method="POST">
    
    <table>
    
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" id="nom" name="nom" required/></td>
        </tr>
        
        <tr>
            <td><label for="login">Login</label></td>
            <td><input type="text" id="login" name="login" required/></td>
        </tr>
    
        <tr>
            <td><label for="email">E-mail</label></td>
            <td><input type="email" id="email" name="email" required/></td>
        </tr>
        
        <tr>
            <td><label for="pass1">Mot de passe</label></td>
            <td><input type="password" id="pass1" name="pass1" required/></td>
        </tr>
    
        <tr>
            <td>Retapez mot de passe</td>
            <td><input type="password" id="pass2" name="pass2" required/></td>
        </tr>
    
        <tr>
            <td><input type="submit" name="submitinscription" value="Inscription"/></td>
            <td>
                <?php if(isset($iscriptionerror)) echo '<span style="color:red;">'.$iscriptionerror.'</span>'; ?>
                <?php if(isset($iscriptionok)) echo '<span style="color:darkblue;">'.$iscriptionok.'</span>'; ?>
            </td>
        </tr>
        
    
    
    </table>
    
</form>

<?php
    
elseif(isset($action) && $action == 'oubli'):

?>

<p>Mot de passe oublié</p>
<hr />

<p>Veuillez renseigner ci-dessous l'<b>adresse e-mail</b> renseignée lors de l'inscription</p>

<form action="./?page=user&action=oubli" method="POST">
    
    
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required/>
            
            <input type="submit" name="submitoubli" value="OK"/>

            <?php if(isset($oublierror)) echo '<span style="color:red;">'.$oublierror.'</span>'; ?>
            <?php if(isset($oubliok)) echo '<span style="color:darkblue;">'.$oubliok.'</span>'; ?>

        </tr>
        
    
    
    </table>
    
</form>

<?php
    
elseif(!isset($_SESSION['user']) || $_SESSION['sid'] != session_id()):

?>

<p>Connexion à l'espace client</p>
<hr />
<br />

<form action="" method="POST">
    <label for="user">Utilisateur : </label>
    <input type="text" id="user" name="user" />
    <label for="password">Mot de passe : </label>
    <input type="password" id="password" name="password" />
    <input type="submit" value="Se connecter" />
    <?php if(isset($error_form_connection)) echo '<span style="color:red;">'.$error_form_connection.'</span>'; ?>
</form>
<br />

<a href="./?page=user&action=inscription">S'inscrire</a>
<br />

<br />
<a href="./?page=user&action=oubli">Mot de passe oublié</a>


<?php

elseif(!isset($action) || $action != 'edit'):

echo '<p>Bienvenue ' . $_SESSION['user']['lenom'] . '. Vous êtes connecté en tant que '. $_SESSION['user']['ledroit'] . '.</p><hr />';

?>

<h3>Charger une nouvelle image</h3>

<form action="" method="POST" enctype="multipart/form-data">
    
    <label for="letitre">Titre du fichier</label>
    <input type="text" id="letitre" name="letitre" required/><br /><br />
    
    <label for="lefichier">Fichier</label>
    <input type="file" id="lefichier" name="lefichier" required/><br/><br />
    
    <label for="ladesc">Description</label><br/>
    <textarea id="ladesc" name="ladesc"></textarea><br/><br/>
    
    <label>Catégories</label><br/><br/>
        <?php 
        
        echo '<table>';
        
        foreach($liste_categories as $value){
            
            echo "<tr><td>{$value['lintitule']}</td><td><input type=\"checkbox\" name=\"category[{$value['id']}]\" value=\"{$value['id']}\" /></td></tr>";
            
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

echo '<p>'.pagination(getCountPhotoByUser($_SESSION['user']['id'])['nb'],$pos,20,'page=user&pos').'</p>';

// for loop display photos

for($i=0;$i<count($liste_photos);$i++){
    
?>

<div class="mini">

    <h4><?php echo $liste_photos[$i]['letitre']; ?></h4>

    <a rel="prettyPhoto[gallery]" href="./images/affichees/<?php echo $liste_photos[$i]['lenom']; ?>.jpg">
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
    
    $categories = explode('|||', getPhotoCategories($liste_photos[$i]['id'])['lintitule']);
    
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
    
    <label for="letitre">Titre</label><br />
    <input type="text" id="letitre" name="letitre" value="<?php echo $photo['letitre']; ?>" required/><br /><br />

    <label for="ladesc">Description</label><br />
    <textarea name="ladesc" id="ladesc" cols="30" rows="10" required><?php echo $photo['ladesc']; ?></textarea><br /><br />
    
    <label>Catégories</label><br /><br />
    
    <?php 

    $category = explode('|||', getPhotoCategories($photo['id'])['lintitule']);

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