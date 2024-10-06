<?php
function db_connect(){
    $host = "localhost";
    $dbname = "vserver";
    $user = "postgres";
    $password = "postgres";

    $connection = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$connection) {
        echo "Error : Unable to connect to PostgreSQL Server.";
        exit();
    }
    return $connection;

}
?>