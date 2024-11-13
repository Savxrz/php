<?php
session_start();

if (!isset($_SESSION['cliente'])) {
    header("Location: bienvenida.php");
    exit;
}

$nombreCliente = $_SESSION['cliente'];
?>

<html>
<head>
<meta charset="UTF-8">
<title>La Frutería</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>

<?php
if (isset($_SESSION['frutas']) && !empty($_SESSION['frutas'])) {
    echo "<b>Este es su pedido :</b><br><ul>";
    foreach ($_SESSION['frutas'] as $tipo => $cant) {
        echo "<li><b>$tipo</b> $cant</li>";
    }
    echo "</ul>";
}
?>

<b><br> REALICE SU COMPRA <?= $nombreCliente ?></b><br>
<form action="index.php" method="post">
    <b>Selecciona la fruta: <select name="fruta">
            <option value="Platanos">Platanos</option>
            <option value="Naranjas">Naranjas</option>
            <option value="Limones">Limones</option>
            <option value="Manzanas">Manzanas</option>
    </select></b>
    Cantidad: <input name="cantidad" type="number" value="0" min="1" size="4">
    <input type="submit" name="accion" value="Anotar">
    <input type="submit" name="accion" value="Terminar">
</form>
</body>
</html>
