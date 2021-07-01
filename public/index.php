<?php 

require_once('../private/initialise.php');
echo "Welcome to the Exercise Tracker App!<br/><br/>";
echo "Public facing homepage<br/><br/>";



// require_once('../private/db_credentials.php');
// require_once('../private/db_functions.php');
// $db = db_connect();
// $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET;
// $connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
// $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// var_dump($connection);

// $sql = "SELECT * FROM exercise_category";
// $stmt = $connection->prepare($sql);
// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);

$exerciseCategories = DatabaseObject::getAllExerciseCategories();
// echo "<pre>";
// var_dump($exerciseCategories);
// echo "</pre>";
foreach($exerciseCategories as $key => $value ) {
    echo "{$value['category_name']}<br/>";
}


?>