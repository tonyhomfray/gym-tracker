<?php 

class Session extends DatabaseObject {

    public $id;
    public $username;
    public $session_date;
    public $session_notes;
    public $workout;
    public $exercises_performed = [];


    public function __construct($args=[]) {
        
        $this->db_id = $args['id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->session_date = $args['session_date'] ?? '';
        $this->session_notes = $args['session_notes'] ?? '';
        $this->workout = $args['workout'] ?? '';
        // $this->exercises_performed = $args['exercises_performed'] ?? '';
    }


    public function setExercisesPerformed($exercises=[]) {

        // TODO this needs to be a loop that adds to an array
        $this->exercises_performed = $exercises;
    }

    static public function getSession($username, $lastWorkout) {
        // TODO this is pointing at the wrong column? 
        $lastSimilarWorkout = $lastWorkout == 'A' ? 'B' : 'A';
        
        // select * from session_log where date = (select max(date) from session_log where id = 2); 
        $sql = "SELECT * FROM session_log WHERE username = '{$username}' AND `date` = (SELECT MAX(`date`) FROM session_log WHERE username = '{$username}' AND workout = '{$lastSimilarWorkout}')";
        // $stmt = self::$db_connection->prepare($sql);
        // $stmt->execute();
        // return $stmt->fetch(PDO::FETCH_ASSOC);
        return self::get_by_sql($sql);
    }
}
?>