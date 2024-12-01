
<?php
function filtrar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = filtrar_input($_POST["nombre"]);
    $alias = filtrar_input($_POST["alias"]);
    $error = "";
    $imagen_subida = false;
    $ruta_imagen = "";

    if (!empty($_FILES["imagen"]["name"])) {
        $nombre_archivo = basename($_FILES["imagen"]["name"]);
        $tipo_archivo = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
        $tamano_archivo = $_FILES["imagen"]["size"];
        $ruta_imagen = "uploads/" . uniqid() . ".png";

        if ($tipo_archivo != "png") {
            $error = "Solo se permiten archivos PNG.";
        } elseif ($tamano_archivo > 10240) { // 10KB
            $error = "El archivo es demasiado grande. Máximo permitido: 10KB.";
        } else {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
                $imagen_subida = true;
            } else {
                $error = "Error al subir la imagen.";
            }
        }
    }

    echo "<h1>Datos del Jugador</h1>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Alias:</strong> $alias</p>";

    if ($imagen_subida) {
        echo "<img src='$ruta_imagen' alt='Imagen del jugador' style='max-width:200px;'>";
    } else {
        echo "<img src='calavera.png' alt='Error o sin imagen' style='max-width:200px;'>";
        if ($error) {
            echo "<p><strong>Error:</strong> $error</p>";
        }
    }
} else {
    header("Location: captura.html");
    exit();
}
?>
