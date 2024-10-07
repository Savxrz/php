 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $num_peldanos = rand(1, 9);


        echo "<code style='font-family: monospace;'>";
        
        // Construir la pirámide
        for ($i = 1; $i <= $num_peldanos; $i++) {
            // Imprimir los espacios para centrar la pirámide
            echo str_repeat(' ', $num_peldanos - $i);
            
            // Imprimir los asteriscos en cada peldaño
            echo str_repeat('*', $i);
            
            // Nueva línea
            echo "<br>";
        }
        
        // Cerrar la etiqueta code
        echo "</code>";
            
    ?>
</body>
</html>