<?php

define('TITLE', 'Telepro-photos.fr');

// préparation des constantes de connexion à mysql

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_MDP', '');
define('DB_NAME', 'arnaudtestjuin');

// constante contenante la racine du site

define('CHEMIN_RACINE', 'http://localhost/arnaudtestjuin/');

// nom des dossiers de destination des images

$dossier_ori = 'images/originales/'; // dossier de l'image originale
$dossier_gd = 'images/affichees/'; // dossier de l'image pour l'affichage
$dossier_mini = 'images/miniatures/'; // dossier des miniatures

// taille proportionnes des images d'affichage, en pixels

$grande_large = 900; // taille maximale en largeur
$grande_haute = 720; // taille maximale en hauteur

// taille des miniatures coupées et contrées, en pixels

$mini_large = 150; // taille réelle en largeur
$mini_haute = 150; // taille réelle en hauteur

// qualité de l'image d'affichage (jpg de 0 à 100)

$grande_qualite = 85;

// qualité de la miniature (jpg de 0 à 100)

$mini_qualite = 70;

// formats acceptés en minuscule dans un tableau, séparé par des ','

$formats_acceptes = array('jpg','jpeg','png');