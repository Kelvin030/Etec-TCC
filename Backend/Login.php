<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "SQLadmin1234";
    $banco = "etecvestibulinho";
    $username = $_POST['Username'];
    $password = $_POST['Userpassword'];

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE usuario ='".$username ."' AND userSenha ='".$password."'"; 
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $conn->close();
        header('Location: http://localhost/Etec/Frontend/Home.php');
        exit;
        
    } else {
        $conn->close();
        header('Location: http://localhost/Etec/Frontend/TelaLogin.php?pass=1');
        exit;
        
    }
    ?>