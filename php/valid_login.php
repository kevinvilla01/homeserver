<?php
require_once 'db_connect.php';

$connection  = db_connect();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Prevenir SQL INJECTION conn consultas separados
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = pg_query_params($connection, $query, array($username));

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);

            //Redireccionar al home
            header('Location: ../home.php');
            exit;
        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'User not found';
    }
pg_close($connection);

?>