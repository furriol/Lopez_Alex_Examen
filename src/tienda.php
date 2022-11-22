<?php

session_start();

if (!isset($_SESSION['expire'])) {
    $_SESSION['expire'] = time();
} else if (time() - $_SESSION['expire'] > 1400) {
    session_destroy();
    header("Location:index.php");
}

$_SESSION['expire'] = time();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['emptyCart'])) {
    unset($_SESSION['cart']);
}

if (isset($_POST['logout'])) {
    setcookie('login',false,time()-3600);
    header('Location: index.php');
}

require_once 'database/QueryBuilder.php';
require_once 'entities/Producto.php';

$qb = new QueryBuilder('producto','Producto',['numProducto','nombre','categoria','precio']);

$products = $qb->getAll();

foreach ($_POST as $key => $value) {
    if (substr($key,0,3) === "add") {
        $where = substr($key,3,1);
        $prod = $qb->getWhere("numProducto = $where");
        array_push($_SESSION['cart'],serialize($prod));
    }
}

require_once 'app/views/tienda.view.php';
