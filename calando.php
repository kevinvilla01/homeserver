<?php
$db = pg_connect("host=localhost port=5432 dbname=vserver user=postgres password=postgres");

if (!$db) {
    echo "Error : Unable to connect to PostgreSQL Server.";
    exit();
} else
    echo "Conexion : Connected to PostgreSQL Server";
?>