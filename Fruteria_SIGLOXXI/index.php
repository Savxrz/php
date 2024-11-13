<?php
session_start();

// 1. Redirigir a `bienvenida.php` si no hay cliente en sesión y no se ha recibido un nombre
if (!isset($_SESSION['cliente']) && !isset($_GET['cliente'])) {
    header("Location: bienvenida.php");
    exit;
}

// 2. Procesar el nombre del cliente recibido desde `bienvenida.php`
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = htmlspecialchars($_GET['cliente']); // Guardar nombre en la sesión
    $_SESSION['frutas'] = []; // Inicializar array de frutas
    header("Location: compra.php");  // Redirigir al formulario de compra
    exit;
}

// 3. Procesar acciones de compra en `compra.php`
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    $fruta = $_POST['fruta'];
    $cantidad = (int)$_POST['cantidad'];

    // Acción de "Anotar" - acumular la fruta en la sesión
    if ($accion == "Anotar" && $cantidad > 0) {
        if (isset($_SESSION['frutas'][$fruta])) {
            $_SESSION['frutas'][$fruta] += $cantidad;
        } else {
            $_SESSION['frutas'][$fruta] = $cantidad;
        }
        header("Location: compra.php"); // Regresar al formulario de compra
        exit;
    } 
    // Acción de "Terminar" - generar y almacenar el resumen del pedido
    elseif ($accion == "Terminar") {
        $compraRealizada = "<h2>Resumen de su pedido, {$_SESSION['cliente']}</h2><ul>";
        foreach ($_SESSION['frutas'] as $tipo => $cant) {
            $compraRealizada .= "<li>$tipo: $cant</li>";
        }
        $compraRealizada .= "</ul>";

        // Guardar el resumen en la sesión y redirigir a despedida.php
        $_SESSION['resumen'] = $compraRealizada;
        header("Location: despedida.php");
        exit;
    }
}

// 4. Si ya hay un cliente en sesión, redirigir a `compra.php`
if (isset($_SESSION['cliente'])) {
    header("Location: compra.php");
    exit;
}
?>


// Si el flujo no ha sido interrumpido, redirigir a la compra
header("Location: compra.php");
exit;
