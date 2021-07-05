<?php 

class User extends DatabaseObject {

    public $dbId;
    public $username;
    public $password;
    public $currentProgram;
    public $isAdmin;
    public $accountCreated;
    public $lastSessionDate;
    public $lastWorkourNumber;
    public $lastSessionId;


    public function __construct($args=[]) {
        
        $this->dbId = $args['id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->currentProgram = $args['current_program'] ?? '';
        $this->isAdmin = $args['is_admin'] ?? '';
        $this->accountCreated = $args['account_created'] ?? '';
        $this->lastSessionDate = $args['last_session_date'] ?? '';
        $this->lastWorkourNumber = $args['last_workout_number'] ?? '';
        $this->lastSessionId = $args['last_session_id'] ?? ''; // TODO add this field to DB table
    }


    static public function getUser($username) {
        $sql = "SELECT * FROM users WHERE username = 'tony'";
        $stmt = self::$db_connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    // CRUD


    // 


}


?>