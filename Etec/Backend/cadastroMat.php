<?php

    include './conectaDB.php';

    $con = new conectaDB();
    $conn = $con->conecta();



    $nome = $_POST['nome'];
    $Status = $_POST['Status'];

    $hoje = date('Ymd');
    


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO materias (mateNome, mateCadastro, mateStatus) VALUES ('".$nome."',".$hoje.",'".$Status."')"; 
    

    if ($conn->query($sql) === True) {
        $conn->close();
        header('Location: ../Frontend/cadastroMat.php?pass=1');
        exit;

    } else {
        $conn->close();
        header('Location: ../Frontend/cadastroMat.php?pass=1');
        exit;
    }
    ?>