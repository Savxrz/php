<?php
session_start();

if (!isset($_SESSION['cliente']) && !isset($_GET['cliente'])) {
    header("Location: bienvenida.php");
    exit;
}

if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = htmlspecialchars($_GET['cliente']); 
    $_SESSION['frutas'] = []; 
    header("Location: compra.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    $fruta = $_POST['fruta'];
    $cantidad = (int)$_POST['cantidad'];

    if ($accion == "Anotar" && $cantidad > 0) {
        if (isset($_SESSION['frutas'][$fruta])) {
            $_SESSION['frutas'][$fruta] += $cantidad;
        } else {
            $_SESSION['frutas'][$fruta] = $cantidad;
        }
        header("Location: compra.php"); 
        exit;
    } 
    elseif ($accion == "Terminar") {
        $compraRealizada = "<h2>Resumen de su pedido, {$_SESSION['cliente']}</h2><ul>";
        foreach ($_SESSION['frutas'] as $tipo => $cant) {
            $compraRealizada .= "<li>$tipo: $cant</li>";
        }
        $compraRealizada .= "</ul>";

        $_SESSION['resumen'] = $compraRealizada;
        header("Location: despedida.php");
        exit;
    }
}

header("Location: compra.php");
exit;
