<?php
// Iniciar sesión
session_start();

try {
    // Conexión a la base de datos
    $host = "localhost"; // Cambia por tu host
    $dbUsername = "postgres"; // Cambia por tu usuario de la base de datos
    $dbPassword = "postgres"; // Cambia por tu contraseña de la base de datos
    $dbName = "vserver"; // Cambia por el nombre de tu base de datos
    $dsn = "pgsql:host=$host;dbname=$dbName";

    // Crear conexión PDO
    $conn = new PDO($dsn, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        var_dump($username, $password);
        var_dump($hashedPassword); // Imprime el hash almacenado


        // Consulta para obtener el usuario
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Verificar si el usuario existe
        if ($stmt->rowCount() > 0) {
            // Obtener los datos del usuario
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['password'];

            // Comparar la contraseña ingresada con la almacenada (verificación con password_verify)
            if (password_verify($password, $hashedPassword)) {
                // Iniciar sesión
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
    }
} catch (PDOException $e) {
    // Manejo de errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
