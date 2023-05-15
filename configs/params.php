<?php

// Fichier contenant les paramètres de configuration du site

// Création d'une constante contenant la route actuelle
define('ROUTE',request_path());

// Emplacement du dossier qui contient les vues du site
define('VIEWS_DIR', __DIR__ . '/../views');

//define('VIEWS_DIR)

// URL du dossier "public" (avec fichiers CSS, JS, images, etc...), servira pour construire les liens dans la partir frontend
define('PUBLIC_PATH', mb_substr($_SERVER['SCRIPT_NAME'], 0, -(mb_strlen(basename(__FILE__)))));