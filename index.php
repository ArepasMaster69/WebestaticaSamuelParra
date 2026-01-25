<?php
$mensaje = "";
$estiloColor = "";
$valorInput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = isset($_POST['nombre']) ? $_POST['nombre'] : "";

    if (trim($nombreUsuario) === "") {
        $mensaje = "¡Por favor, escribe algo en la caja!";
        $estiloColor = "color: red;"; 
        $valorInput = $nombreUsuario; 
    } else {
        $nombreProcesado = strtoupper($nombreUsuario);
        $mensaje = "¡Hola, " . htmlspecialchars($nombreProcesado) . "! Bienvenido a la web de Samuel.";
        $estiloColor = "color: #064E3B;"; 
        $valorInput = ""; 
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web de Samuel Pene escroto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main class="container">
        <img src="imagenes/avatar.jpg" alt="Avatar de Samuel" class="mi-imagen">

        <h1>Página Web de Samuel</h1>

        <p>Introduce tu nombre para recibir un saludo personalizado:</p>

        <form class="formulario" method="POST" action="">
            <input type="text" name="nombre" id="nombreInput" placeholder="Escribe aquí..." value="<?php echo htmlspecialchars($valorInput); ?>">
            <button type="submit" id="btnProcesar">Enviar</button>
        </form>

        <p id="mensaje" style="<?php echo $estiloColor; ?>">
            <?php echo $mensaje; ?>
        </p>
    </main>

    </body>

</html>