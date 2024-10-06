<?php
require_once 'db_connect.php';

$connection  = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = pg_query($connection, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if (pg_num_rows($query) > 0) {
        $user = pg_fetch_assoc($query);

        //Redireccionar al home
        header('Location: ../home.php');
        exit;

        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'User not found';
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

pg_close($connection);

?>