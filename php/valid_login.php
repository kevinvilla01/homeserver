<?php
require_once 'db_connect.php';

$connection  = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Prevenir SQL INJECTION conn consultas separados
    $query = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($connection, $query, array($username));

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);

        //Verificar contraseña
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            //Redireccionar al home
            header('Location: ../home.php');
            exit;
        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'User not found';
    }
}
pg_close($connection);

?>