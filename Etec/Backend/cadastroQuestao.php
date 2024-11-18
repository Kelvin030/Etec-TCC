<?php

    include './conectaDB.php';

    $con = new conectaDB();
    $conn = $con->conecta();



    $questPergunta = $_POST['questPergunta'];
    $Status = $_POST['Status'];
    $Prova = $_POST['Prova'];
    $Dificuldade = $_POST['Dificuldade'];
    $hoje = date('Ymd');

    


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva) VALUES ('".$questPergunta."',".$hoje.",'".$Status."','".$Dificuldade."','".$Prova."')"; 
    

    if ($conn->query($sql) === True) {
        $conn->close();
        header('Location: ../Frontend/cadastroQuestao.php?pass=2');
        exit;

    } else {
        $conn->close();
        header('Location: ../Frontend/cadastroQuestao.php?pass=1');
        exit;
    }
    ?>