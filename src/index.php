<?php

if ($_COOKIE['login']) {
    header('Location: tienda.php');
} else {
    header('Location: login.php');
}