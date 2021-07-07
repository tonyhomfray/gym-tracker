<?php 

class User extends DatabaseObject {

    public $id;
    public $username;
    public $password;
    public $current_program;
    public $is_admin;
    public $account_created;
    public $last_session_date;
    public $last_workout;
    public $lastSessionId;


    public function __construct($args=[]) {
        
        // $this->dbId = $args['id'] ?? '';
        // $this->username = $args['username'] ?? '';
        // $this->password = $args['password'] ?? '';
        // $this->currentProgram = $args['current_program'] ?? '';
        // $this->isAdmin = $args['is_admin'] ?? '';
        // $this->accountCreated = $args['account_created'] ?? '';
        // $this->lastSessionDate = $args['last_session_date'] ?? '';
        // $this->lastWorkout = $args['last_workout'] ?? '';
        // $this->lastSessionId = $args['last_session_id'] ?? ''; // TODO add this field to DB table
    }


    static public function getUser($username) {
        $sql = "SELECT * FROM users WHERE username = '{$username}'";
        return self::get_by_sql($sql);
        // return $result;
        
    }

    // CRUD


    // 


}


?>