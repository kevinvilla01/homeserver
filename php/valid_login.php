<?php
// Inicia la sesión
session_start();

try {
    // Conexión a la base de datos PostgreSQL
    $host = "localhost";
    $dbUsername = "postgres"; // Cambiar por tu usuario de la base de datos
    $dbPassword = "postgres"; // Cambiar por tu contraseña de la base de datos
    $dbName = "vserver"; // Cambiar por tu base de datos
    $dsn = "pgsql:host=$host;dbname=$dbName";

    // Crear una conexión con PDO
    $conn = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta a la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si el usuario existe
    if ($stmt->rowCount() > 0) {
        // Obtener datos del usuario
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['username'] = $username;
            header("Location: ../home.php"); // Redirigir a la página del dashboard
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta.'); window.location.href = '../login.php';</script>";
        }
    } else {
        // El usuario no existe
        echo "<script>alert('Usuario no encontrado.'); window.location.href = '../login.php';</script>";
    }
} catch (PDOException $e) {
    // Manejo de errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
