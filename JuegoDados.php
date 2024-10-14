<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Dados - Rojo vs Azul</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: while;
            margin: 0;
            padding: 20px; 
            text-align: left; 
        }
        .dadosRojo {
            display: flex; 
            align-items: center; 
            margin: 20px 0; 
            padding: 15px; 
            width: 300px; 
            height: 120px; 
            font-size: 5em; 
            margin: 0 5px; 
            background-color: red;
        }
        .dadosAzul {
            display: flex; 
            align-items: center;
            margin: 20px 0; 
            padding: 15px; 
            width: 300px; 
            height: 120px; 
            font-size: 5em; 
            margin: 0 5px; 
            background-color: blue;
        }

        .jugador {
            display: flex; 
            align-items: center; 
            margin: 20px 0;
        }
    </style>
</head>
<body>

<h1>Cinco dados</h1>
<p>Actualice la página para otra partida</p>

<?php
function lanzarDados() {
    $dados = [];
    for ($i = 0; $i < 5; $i++) {
        $dados[] = rand(1, 6); 
    }
    return $dados;
}

$dadosRojo = lanzarDados();
$dadosAzul = lanzarDados();

function calcularPuntuacion($dados) {
    sort($dados);
    array_shift($dados);
    array_pop($dados); 
    return array_sum($dados);
}

$puntuacionRojo = calcularPuntuacion($dadosRojo);
$puntuacionAzul = calcularPuntuacion($dadosAzul);

$ganador = '';
if ($puntuacionRojo > $puntuacionAzul) {
    $ganador = '¡Ganador: Jugador 1!';
} elseif ($puntuacionRojo < $puntuacionAzul) {
    $ganador = '¡Ganador: Jugador 2!';
} else {
    $ganador = '¡Es un empate!';
}


function obtenerIconoDado($valor) {
    switch ($valor) {
        case 1:
            return '&#9856;'; 
        case 2:
            return '&#9857;'; 
        case 3:
            return '&#9858;'; 
        case 4:
            return '&#9859;'; 
        case 5:
            return '&#9860;'; 
        case 6:
            return '&#9861;';
    }
}
?>


<div class="jugador">
    <h2>Jugador 1</h2>
    <div class="dadosRojo">
        <?php foreach ($dadosRojo as $dado): ?>
            <span ><?php echo obtenerIconoDado($dado); ?></span> <!-- Icono del dado -->
        <?php endforeach; ?>
    </div>
    <h3>Puntuación: <?php echo $puntuacionRojo; ?></h3>
</div>

<div class="jugador">
    <h2>Jugador 2</h2>
    <div class="dadosAzul">
        <?php foreach ($dadosAzul as $dado): ?>
            <span ><?php echo obtenerIconoDado($dado); ?></span>
        <?php endforeach; ?>
    </div>
    <h3>Puntuación: <?php echo $puntuacionAzul; ?></h3>
</div>

<h2><?php echo "Resultado " .$ganador; ?></h2>

</body>
</html>
