<?php

    include './conectaDB.php';

    $con = new conectaDB();
    $conn = $con->conecta();



    $nome = $_POST['nome'];
    $Status = $_POST['Status'];
    $Materia = $_POST['Materia'];
    $hoje = date('Ymd');

    


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO prova (provaNome, provaCadastro, provaStatus, provaMateria) VALUES ('".$nome."',".$hoje.",'".$Status."','".$Materia."')"; 
    

    if ($conn->query($sql) === True) {
        $conn->close();
        header('Location: ../Frontend/cadastroProva.php?pass=2');
        exit;

    } else {
        $conn->close();
        header('Location: ../Frontend/cadastroProva.php?pass=1');
        exit;
    }
    ?>