<?php 
define('PIEDRA1', "&#x1F91C;"); // Puño derecho
define('PIEDRA2', "&#x1F91B;"); // Puño izquierdo
define('TIJERAS', "&#x1F596;");  // Tijeras 
define('PAPEL', "&#x1F91A;");    // Papel

$opciones = ['Piedra', 'Papel', 'Tijeras'];

function obtenerSimbolo($eleccion, $jugador) {
    if ($eleccion == 'Piedra') {
        return $jugador === 1 ? PIEDRA1 : PIEDRA2;
    }
    switch ($eleccion) {
        case 'Papel':
            return PAPEL;
        case 'Tijeras':
            return TIJERAS;
    }
}

$jugador1 = $opciones[rand(0, 2)];
$jugador2 = $opciones[rand(0, 2)];

echo "<h1>¡Piedra, Papel, Tijeras!</h1>";
echo "<p>Actualize la página para mostrar otra partida.</p>";
echo "<div style='display: flex; align-items: center;'>";
echo "<div style='margin-right: 20px;'>";
echo "<h2>Jugador 1<br><span style='font-size: 70px;'>" . obtenerSimbolo($jugador1, 1) . "</span></h2>";
echo "</div>";
echo "<div>";
echo "<h2>Jugador 2<br><span style='font-size: 70px;'>" . obtenerSimbolo($jugador2, 2) . "</span></h2>";
echo "</div>";
echo "</div>";

function determinarGanador($jugador1, $jugador2) {
    if ($jugador1 == $jugador2) {
        echo "<h2>¡Empate!</h2>";
    } elseif (($jugador1 == 'Piedra' && $jugador2 == 'Tijeras') ||
              ($jugador1 == 'Papel' && $jugador2 == 'Piedra') ||
              ($jugador1 == 'Tijeras' && $jugador2 == 'Papel')) {
        echo "<h2>Ha ganado jugador 1!</h2>";
    } else {
        echo "<h2>Ha ganado jugador 2!</h2>";
    }
}

$resultado = determinarGanador($jugador1, $jugador2);
echo $resultado;

