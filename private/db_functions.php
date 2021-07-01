<?php 

function db_connect() {
    $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET;
    $connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // confirm_db_connection($connection);
    return $connection;
}

function confirm_db_connection($connection) {
    // TODO improve the following line to better handle DB connection checking
    if($connection->errorCode() != '00000') {
        $msg = "Database connection failed: ";
        // $msg .= $connection->errorInfo()['2'];
        // var_dump($connection->errorInfo());
        $msg .= " (" . $connection->errorCode() . ")";
        exit($msg);
    }

    function db_disconnect($connection) {
        if(isset($connection)) {
            $connection->close();
        }
    }

}
?>