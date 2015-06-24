<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo TITLE ?></title>
    
    <link rel="stylesheet" href="./views/css/style.css" />
    
</head>
<body>
    
    <h1><?php echo TITLE ?></h1>
    
    <header>
        
        <nav>
            
            <ul class='menu'>
                <li><a href="./">Accueil</a> |</li>
                <li><a id="dropdowntrigger" onclick="toggledropdown()">Catégories <small>&#x25BC;</small></a> |</li> <?php // &#x25B2; for normal triangle ?>
                <li><a href="./?page=contact">Nous contacter</a> |</li>
                <li><a href="./?page=userconnect">Espace client</a></li>
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
        
        <p>Message de bienvenue</p>
        
    </header>
    
    <section>
        
        <?php echo $content; ?>
        
    </section>
    <script type="text/javascript" src='./views/js/main.js'></script>
</body>
</html>