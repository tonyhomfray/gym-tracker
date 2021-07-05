<?php 

require_once('../private/initialise.php');
echo "Welcome to the Exercise Tracker App!<br/><br/>";
echo "Public facing homepage<br/><br/>";


$username = 'tony';
$userRecord = User::getUser($username);

echo "<br/>";
$user = new User($userRecord);
echo "<br/>";

echo "User Object<br/>";
    echo "<pre>";
    var_dump($user);
    echo "</pre>";

// echo $user->username . "<br/>";
// echo $user->currentProgram . "<br/>";
$lastSessionDate = $user->lastSessionDate;
$lastWorkoutNumber = $user->lastWorkourNumber;

// echo "Last workout date: " . $lastSessionDate . "<br/>";
// echo "Last workout number: " . $lastWorkoutNumber . "<br/>";

$sessionRecord = Session::getSession($username, $lastWorkoutNumber);
// echo "<pre>";
// var_dump($sessionRecord);
// echo "</pre>";

$session = new Session($sessionRecord);
echo "<pre>";
var_dump($session);
echo "</pre>";

// echo ($session->db_id);

$exerciseRecords = Exercise::getExercise($session->db_id);
// echo "<pre>";
// var_dump($exerciseRecords);
// echo "</pre>";


foreach ($exerciseRecords as $exercise ) {
    $exerciseObj = new Exercise($exercise);
    $session->exercises_performed[] = $exerciseObj;
}
echo "Here they are!<br/>";
echo "<pre>";
var_dump($session->exercises_performed);
echo "</pre>";


?>