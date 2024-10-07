<?php
// Conectar a la base de datos
try {
    $host = "localhost";
    $dbUsername = "postgres"; // Cambiar por tu usuario de la base de datos
    $dbPassword = "postgres"; // Cambiar por tu contraseña de la base de datos
    $dbName = "vserver"; // Cambiar por tu base de datos
    $dsn = "pgsql:host=$host;dbname=$dbName";

    // Crear una conexión con PDO
    $conn = new PDO($dsn, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Supongamos que tienes el nombre de usuario
            $username = 'kev1';
            $plainPassword = '1234'; // Contraseña en texto plano

            // Cifrar la contraseña
            $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

            // Conectar a la base de datos
            $conn = new PDO($dsn, $dbUsername, $dbPassword);
            $sql = "UPDATE users SET password = :hashedPassword WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':hashedPassword', $hashedPassword);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            echo "Contraseña cambiada exitosamente.";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
