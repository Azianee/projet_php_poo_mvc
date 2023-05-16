<?php

//Fichier contenant les fonctions utilisées par le site

// Fonction qui permettra d'autocharger les fichiers contenant les classes PHP (dans le dossier "classes")
function call($className){

    // Emplacement du dossier des classes de notre site ("classes" dans cet exemple), auquel on ajoute le nom du fichier à inclure avec .php derrière
    $file = __DIR__ . '/../src/' . $className . '.php';

    // Remplacement des slashs et antislashs par le séparateur du système d'exploitation utilisé actuellement (DIRECTORY_SEPARATOR)
    $file = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $file);

    // Si le fichier n'existe pas, on provoque une exception pour l'indiquer
    if(!file_exists($file)){
        throw new Exception('La classe "' . $className . '" n\'existe pas, un "use" a peut-être été oublié ?');
    }

    require $file;

}

// Enregistrement de la fonction d'autoload auprès de PHP
spl_autoload_register('call');

//---------------------------------------------------------------------

// Conversion de toutes les erreurs "classiques" de PHP en exceptions (comme ça, elles seront aussi capturées par notre trycatch général)
function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler');

// -------------------

// Activation dusystème des sessions PHP
session_start();


// -------------------

// Fonction permettant de récupérer la route actuelle (partie de l'URL entre l'accès physique du dossier du site et les données GET)
// si l'url est "http://monsite.fr/contactez-nous/", la route récupérée sera "/contactez-nous/"
// si l'url est "http://monsite.fr/article/test/?name=alice", la route récupérée sera "/article/test/"

function request_path()
{
$request_uri = explode('/', ($_SERVER['REQUEST_URI']));
$script_name = explode('/', ($_SERVER['SCRIPT_NAME']));
$parts = array_diff_assoc($request_uri, $script_name);
$path = implode('/', $parts);
if (empty($path))
{
return '/';
}
$path = '/' . $path;
if (($position = strpos($path, '?')) !== FALSE)
{
$path = substr($path, 0, $position);
}
return $path;
}

//--------------------------

// Fonction qui instancie une connexion à la base de données et la retourne (nécessaire pour les classes manager DAO de notre site)
function connectedDb(): PDO
{
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    return $db;
}
//--------------------------

// Fonction qui retourne true si on est connecté, sinon false

function isConnected(){
    return isset($_SESSION['user']);
}