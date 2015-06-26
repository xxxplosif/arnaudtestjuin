<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo TITLE ?></title>
    
    <link rel="stylesheet" href="./views/css/style.css" />
    
</head>
<body>
    
    <h1>
        <?php 
        
        if($page == 'user') {
            
            echo TITLE.' - Espace client';
            
        }else{
            
            echo TITLE;
            
        }
        
        ?>
    </h1>
    
    <header>
        
        <nav>
            
            <ul class='menu'>
                <li><a href="./">Accueil</a> |</li>
                <li><a id="dropdowntrigger" onclick="toggledropdown()">Catégories <small>&#x25BC;</small></a> |</li> <?php // &#x25B2; for normal triangle ?>
                <li><a href="./?page=contact">Nous contacter</a> |</li>
                <li><a href="./?page=user">Espace client</a></li>
                
                <?php 
                
                if(isset($_SESSION['user']) && $_SESSION['user']['laperm'] == 0){
                    
                    echo " | <li><a href=\"./?page=administration\">Administration</a></li>";
                    
                }
                
                if(isset($_SESSION['user']) && $_SESSION['user']['laperm'] == 1){
                    
                    echo " | <li><a href=\"./?page=moderation\">Modération</a></li>";
                    
                }
                
                if(isset($_SESSION['user'])){
                    
                    echo " | <li><a href=\"./?page=deconnect\">Se déconnecter</a></li>";
                    
                }
                
                ?>
                
                | <li>
                    <form action="./?page=cherche" method="POST">
                        Rechercher les images <input type="text" name="q" />
                        <input type="submit" value="chercher" />
                    </form>
                </li>
                
            </ul>
            
                <?php 
                
                // currently building
                
                echo '<div id="dropdown"><hr />';
                
                for($i=0;$i<count($liste_categories);$i++){
                    
                    echo "<a href=\"./?page=categorie&id={$liste_categories[$i]['id']}\">{$liste_categories[$i]['lintitule']}</a>";
                    
                    if($i != count($liste_categories) -1 ){
                        
                        echo ' | ';
                        
                    }
                    
                }
                
                echo '</div>';
                
                ?>
            
            <hr />
            
        </nav>
        
    </header>
    
    <section>
        
        <?php echo $content; ?>
        
    </section>
    <script type="text/javascript" src='./views/js/main.js'></script>
</body>
</html>