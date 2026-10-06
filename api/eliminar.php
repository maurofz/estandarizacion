<?php
session_start();

$indice = (int)($_POST['indice'] ?? -1);

if (isset($_SESSION['personas'][$indice])) {
    unset($_SESSION['personas'][$indice]);
    $_SESSION['personas'] = array_values($_SESSION['personas']);
}