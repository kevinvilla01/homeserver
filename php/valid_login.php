<?php
require 'db_connect.php';

session_start();

if (empty($_POST["username"]) || empty($_POST["password"])){
    echo "<script>alert('Los campos están vacíos');</script>";
}
else {
    $usr=$_POST["username"];
    $pass=$_POST["password"];

    //Consulta para obtener el usuario y password
    $query=pg_query($Conection,"SELECT * FROM users WHERE username='$usr' AND password ='$pass'");

    if (pg_num_rows($query)>0) {
        $user = pg_fetch_assoc($query); // Obtiene la fila de resultados como un array asociativo

        //Redireccionar al dashboard según el rol
        header("Location: ../home.php");
        exit();
    }
    else{
        echo "<script>alert('ACCESO DENEGADO');</script>";
    }
}

?>