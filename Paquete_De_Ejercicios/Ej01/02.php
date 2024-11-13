 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $num1 = random_int(1,10);
        echo "El número aleatorio es = " .$num1;

        for ($i = 1; $i <=$num1; $i++) {
            if ($i % 2 == 1) {
                echo "<p style = 'color:blue;'>";
            } else {
                echo "<p style = 'color:red'>";
            }

            for ($j = 1; $j <=$i; $j++) {
                echo $i;
            }
    
            echo "</p>";
        }
            
    ?>
</body>
</html>