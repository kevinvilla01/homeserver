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

    // Consulta para obtener todos los usuarios con sus contraseñas actuales
    $sql = "SELECT id_user, password FROM users"; // Asegúrate de que el nombre de la columna sea 'password'
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Recorrer cada usuario y actualizar su contraseña
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userId = $row['id'];
        $plainPassword = $row['password']; // Contraseña actual (texto plano o md5)

        // Verificar si la contraseña está en texto plano o en md5 y luego cifrarla con password_hash()
        if (strlen($plainPassword) < 60) { // Si la longitud es menor a 60, no es un hash de password_hash()
            $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $updateSql = "UPDATE users SET password = :hashedPassword WHERE id_user = :id";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':hashedPassword', $hashedPassword);
            $updateStmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $updateStmt->execute();

            echo "Contraseña del usuario con ID $userId ha sido actualizada.<br>";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
