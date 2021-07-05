<?php 

require_once('../private/initialise.php');

$program = [
    "workout_1" => [
        "leg" => "Deadlift",
        "v-pull" => "Lat Pull Down",
        "v-push" => "Barbell Overhead Press",
        "isolation_1" => "Bicep Curls",
        "isolation_2" => "Abs"
    ],
    "workout_2" => [
        "leg" => "Barbell Squat",
        "h-push" => "Bench Press",
        "h-pull" => "Single Arm Dumbbell Row",
        "isolation_1" => "Tricep Press Down",
        "isolation_2" => "Calf Raise"
    ]
];

// echo gettype($program);
echo "<pre>";
var_dump($program);
echo "</pre>";

// echo json_encode($program);
echo "<br/>";
$serialized = serialize($program);
echo "Serialised:<br/>" . $serialized;
echo "<br/>";
// echo gettype(json_encode($program));
echo "<br/>";
echo "<pre>";
// var_dump(unserialize($serialized));
echo "</pre>";
echo "<br/>";


echo "<hr>";
// $sql = "SELECT * FROM programs WHERE id = 1";
$sql = "SELECT * FROM programs WHERE id = 3";

$stmt = $db_connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($result);

$prog = unserialize($result['details']);
// $prog = json_decode($result['details']);
// REASON using json encode/decode ends up with an object, not an array. serialise() works more smoothly.

// echo "<pre>";
// var_dump($result);
// echo "</pre>";

// echo "<pre>";
// var_dump($result['details']);
// echo "</pre>";

// echo gettype($prog);


echo "<pre>";
var_dump($prog);
echo "</pre>";
