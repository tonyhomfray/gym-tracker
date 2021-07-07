<?php 

require_once('../private/initialise.php');

$username = 'tony';
// $userRecord = User::getUser($username);
// $user = new User($userRecord);
$user = User::getUser($username)['0'];


$lastSessionDate = $user->last_session_date;
$lastWorkout = $user->last_workout;
$currentProgram = $user->current_program;

// $sessionRecord = Session::getSession($username, $lastWorkout);
// $session = new Session($sessionRecord);
$session = Session::getSession($username, $lastWorkout)['0'];


$exerciseRecords = Exercise::getExercise($session->id);


foreach ($exerciseRecords as $exercise ) {
    $exerciseObj = new Exercise($exercise);
    $session->exercises_performed[] = $exerciseObj;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/main.css">
    <title>Exercise Tracker - Home</title>
</head>
<body>
    <nav id="top-nav">My Navigation</nav>
    
    <div id="main">
        <h1>Welcome to the Exercise Tracker App!</h1>
        <h2>Public facing homepage</h2>
        <h3>Welcome <?php echo $username; ?></h3>


        <div id="summary">
            <p>Current Program: <?php echo $currentProgram; ?></p>
            <p>Last Workout: <?php echo $lastSessionDate; ?></p>
        </div>

        <div>
            <?php 
            foreach ($session->exercises_performed as $exercise ) {
                var_dump($exercise);
                echo "<br/>";
            }
            ?>
        </div>

    </div> <!-- #main -->




<?php include_once(INCLUDES_FOLDER_PATH . '/footer.php'); ?>




<?php 

// echo "<hr>";

// echo "User Object<br/>";
//     echo "<pre>";
//     var_dump($user);
//     echo "</pre>";

// echo "<pre>";
// var_dump($sessionRecord);
// echo "</pre>";

echo "<pre>";
var_dump($session);
echo "</pre>";

// echo "<pre>";
// var_dump($exerciseRecords);
// echo "</pre>";

?>