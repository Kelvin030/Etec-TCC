<?php
session_start();

if (isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: ../Frontend/TelaLogin.php');
    exit();
}
