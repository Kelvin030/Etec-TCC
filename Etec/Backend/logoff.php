<?php
session_start();

if (isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: http://localhost/Etec/Frontend/TelaLogin.php');
    exit();
}
