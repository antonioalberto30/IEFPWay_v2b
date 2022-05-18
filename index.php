<?php

// Página inicial. Caso exista um login a
session_start();
if(isset($_SESSION["id"])){
    require $_SERVER['DOCUMENT_ROOT'] . '/pages/topup.php';
}else {
    require $_SERVER['DOCUMENT_ROOT'] . '/pages/login.php';
}

?>