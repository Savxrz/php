<?php
session_start();

// Obtener el resumen de la compra y destruir la sesión
$compraRealizada = isset($_SESSION['resumen']) ? $_SESSION['resumen'] : "";
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LA FRUTERIA</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<?= $compraRealizada ?>
<br> Muchas gracias, por su pedido. <br><br>
<input type="button" value="NUEVO CLIENTE" onclick="location.href='index.php'">
</body>
</html>