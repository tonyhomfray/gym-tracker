<?php 

class DatabaseObject {

    static protected $db_connection;
    static protected $table_name;
    static protected $columns = [];
    public $errors = [];

    static public function set_db_connection($connection) {
        self::$db_connection = $connection;
    }

    // TODO move to a sub-class
    // static public function getAllExerciseCategories() {
    //     $sql = "SELECT * FROM exercise_category";
    //     $stmt = self::$db_connection->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     // var_dump($result);
    //     return $result;
    // }


    static public function get_by_sql($sql) {
        $stmt = self::$db_connection->prepare($sql);
        $result = $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result) {
            exit ("Database query failed.");
        }
        $object_array = [];
        while($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $object_array[] = static::instantiateRecord($record);
        }
        return $object_array;
    }

    // Generic function to instantiate any database record as a PHP Object
    static public function instantiateRecord($record) {
        $object = new static;
        foreach ($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

}
?>