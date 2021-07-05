<?php 

class Exercise extends DatabaseObject {
    
    public $db_id;
    public $session_id;
    public $exercise_name;
    public $sets;
    public $reps;
    public $weight;
    public $notes;
    public $workload;

    public function __construct($args=[]) {
        $this->db_id = $args['db_id'] ?? '';
        $this->session_id = $args['session_id'] ?? '';
        $this->exercise_name = $args['exercise_name'] ?? '';
        $this->sets = $args['sets'] ?? '';
        $this->reps = $args['reps'] ?? '';
        $this->weight = $args['weight'] ?? '';
        $this->notes = $args['notes'] ?? '';
        $this->workload = $args['workload'] ?? '';
    }

    static public function getExercise($sessionId) {
        
        $sql = "SELECT * FROM exercise_log WHERE session_id = {$sessionId}";
        $stmt = self::$db_connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }


}



?>