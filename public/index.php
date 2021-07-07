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


$session->exercises_performed = Exercise::getExercise($session->id);


// foreach ($exerciseRecords as $exercise ) {
//     $exerciseObj = new Exercise($exercise);
//     $session->exercises_performed[] = $exerciseObj;
// }


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
    <nav id="top-nav">
        <div id="nav-top-left">
            <span>Nav1</span>
            <span>Nav2</span>
            <span>Nav3</span>
        </div>
        <div id="nav-top-right">
            <span>Welcome back <?php echo $username; ?></span>
        </div>
    </nav>

    <div id="main">
        <h1>Welcome to the Exercise Tracker App!</h1>

        <div id="summary">
            <p>Current Program: <?php echo $currentProgram; ?></p>
            <p>Last Workout: <?php echo $lastSessionDate; ?></p>
        </div>

        <div>
            <table>
                <tr>
                    <th>Exercise</th>
                    <th>Reps</th>
                    <th>Weight</th>
                </tr>

                <?php 
            foreach ($session->exercises_performed as $exercise ) {
                for($i = 0; $i < $exercise->sets; $i++) {
                    echo "<tr>";
                    if($i==0) {
                        echo "<td>{$exercise->exercise_name}</td>";
                    } else {
                        echo "<td>&nbsp;</td>";
                    }
                    $reps = explode("|", $exercise->reps);
                    $weight = explode("|", $exercise->weight);
                    echo "<td>{$reps[$i]}</td>";
                    echo "<td>{$weight[$i]}</td>";
                    echo "</tr>";
                }
                echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
            }
            ?>
            </table>
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