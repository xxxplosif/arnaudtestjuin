<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./views/css/style.css" />
    <title><?php echo TITLE ?></title>
</head>
<body>
    
    <h1><?php echo TITLE ?></h1>
    
    <header>
        
        <nav>
            
            <ul class='menu'>
                <li><a href="./">Accueil</a> |</li>
                <li><a href="">Catégories <small>&#x25BC;</small></a> |</li>
                <li><a href="./?page=contact">Nous contacter</a> |</li>
                <li><a href="./?page=userconnect">Se connecter à l'espace client</a></li>
            </ul>
            
            <hr />
            
                <?php 
                
                // currently building
                
                echo '<div class="dropdown"><ul>';
                
                foreach($liste_categories as $key => $value){
                    echo "<li><a href=\"\">{$value['lintitule']}</a></li>";
                }
                
                echo '</ul></div>';
                
                ?>

            <hr />
            
        </nav>
        
        <p>Message de bienvenue</p>
        
    </header>
    
    <section>
        
        <?php echo $content; ?>
        
    </section>
    
</body>
</html>