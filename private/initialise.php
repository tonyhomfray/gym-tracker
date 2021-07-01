<?php 

ob_start();

// define some file path constants
define("PRIVATE_FOLDER_PATH", dirname(__FILE__));
define("PROJECT_ROOT_PATH", dirname(PRIVATE_FOLDER_PATH));
define("PUBLIC_FOLDER_PATH", PROJECT_ROOT_PATH . DIRECTORY_SEPARATOR . 'public');
define("INCLUDES_FOLDER_PATH", PRIVATE_FOLDER_PATH . DIRECTORY_SEPARATOR . 'includes');


// define some URL constants
// $public_endpoint = strpos($_SERVER['SCRIPT_NAME'], '/public');
// $public_endpoint = $_SERVER['DOCUMENT_ROOT'], '/public';
define("WWW_ROOT", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'exercisetracker' . DIRECTORY_SEPARATOR . 'public');


require_once("db_credentials.php");
require_once("db_functions.php");


// Autoload class definitions
function my_autoload($class) {
if(preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '.class.php');
}
}
spl_autoload_register('my_autoload');


// create a new database connection
$db_connection = db_connect();
// assign the connection to the DatabaseObject static class property
DatabaseObject::set_db_connection($db_connection);



?>