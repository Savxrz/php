 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body> 
    <?php
        $antes=microtime(true);
        $veces = 0;
        while ($veces < 3) {
            $num = random_int(1,10);
            if ($num == 1) {
                $veces++;
            } else {
                $veces = 0;
            }
        }
        $despue=microtime(true);
        
        $tiempo=($despue - $antes)

       // echo "Han salido ";
    ?>
</body>
</html>