<?php 

class Session extends DatabaseObject {

    private $db_id;
    private $username;
    public $session_date;
    public $session_notes;
    public $workout_number;
    public $exercises_performed;


    public function __construct($args=[]) {
        
        $this->db_id = $args['db_id'];
        $this->username = $args['username'];
        $this->session_date = $args['session_date'];
        $this->session_notes = $args['session_notes'];
        $this->workout_number = $args['workout_number'];
        $this->exercises_performed = $args['exercises_performed'];
    }


    public function setExercisesPerformed($exercises=[]) {

        // TODO this needs to be a loop that adds to an array
        $this->exercises_performed = $exercises;
    }
}
?>