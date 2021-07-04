<?php 

class User extends DatabaseObject {

    private $dbId;
    private $username;
    private $password;
    public $currentProgram;
    private $isAdmin;
    private $accountCreated;
    private $lastSessionDate;
    private $lastSessionId;


    public function __construct($args=[]) {
        
        $this->dbId = $args['dbId'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->currentProgram = $args['currentProgram'] ?? '';
        $this->isAdmin = $args['isAdmin'] ?? '';
        $this->accountCreated = $args['accountCreated'] ?? '';
        $this->lastSessionDate = $args['lastSessionDate'] ?? '';
        $this->lastSessionId = $args['lastSessionId'] ?? '';
    }

    // CRUD


    // 


}


?>