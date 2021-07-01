<?php 

class DatabaseObject {

    static protected $db_connection;
    static protected $table_name;
    static protected $columns = [];
    public $errors = [];

    static public function set_db_connection($connection) {
        self::$db_connection = $connection;
    }

    static public function getAllExerciseCategories() {
        $sql = "SELECT * FROM exercise_category";
        $stmt = self::$db_connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    }
}
?>