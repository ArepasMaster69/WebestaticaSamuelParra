<?php
$host = "localhost";
$user = "admin_web";
$pass = "TuPasswordSegura"; 
$db   = "mi_proyecto";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = "";
$estiloColor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = isset($_POST['nombre']) ? $_POST['nombre'] : "";

    if (trim($nombreUsuario) === "") {
        $mensaje = "¡Por favor, escribe algo!";
        $estiloColor = "color: red;"; 
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $stmt->close();
        
        $mensaje = "¡Hola, " . htmlspecialchars(strtoupper($nombreUsuario)) . "! Guardado en la BD.";
        $estiloColor = "color: #064E3B;"; 
    }
}

$sql = "SELECT nombre FROM usuarios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web de Samuel Parra</title>
    <link rel="stylesheet" href="css/styles.css"> </head>
<body>
    <main class="container"> <img src="imagenes/avatar.jpg" alt="Avatar de Samuel" class="mi-imagen"> <h1>Página Web de Samuel</h1>

        <form class="formulario" method="POST" action="">
            <input type="text" name="nombre" placeholder="Tu nombre...">
            <button type="submit">Enviar y Guardar</button>
        </form>

        <p id="mensaje" style="<?php echo $estiloColor; ?>">
            <?php echo $mensaje; ?>
        </p>

        <hr>
        <h3>Usuarios en la Base de Datos:</h3>
        <ul style="text-align: left; display: inline-block;">
            <?php
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row["nombre"]) . "</li>";
                }
            } else {
                echo "<li>No hay usuarios aún</li>";
            }
            $conn->close();
            ?>
        </ul>
    </main>
</body>
</html>