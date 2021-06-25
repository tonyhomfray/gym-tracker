<?php 

ob_start();

// define some file path constants
define("PRIVATE_FOLDER_PATH", dirname(__FILE__));
define("PROJECT_ROOT_PATH", dirname(PRIVATE_FOLDER_PATH));
define("PUBLIC_FOLDER_PATH", PROJECT_ROOT_PATH . '/public');
define("INCLUDES_FOLDER_PATH", PRIVATE_FOLDER_PATH . '/includes');


// define some URL constants
// $public_endpoint = strpos($_SERVER['SCRIPT_NAME'], '/public');
// $public_endpoint = $_SERVER['DOCUMENT_ROOT'], '/public';
define("WWW_ROOT", $_SERVER['DOCUMENT_ROOT'] . '/exercisetracker/public')

?>