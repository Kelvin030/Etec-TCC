<?php
    $hostDB = "localhost";
    $usuarioDB = "root";
    $senhaDB = "SQLadmin1234";
    $bancoDB = "etecvestibulinho";
    $conn = new mysqli($hostDB, $usuarioDB, $senhaDB, $bancoDB);



    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];
    $etecPolo = $_POST['etecPolo'];
    $tipoUser = $_POST['tipoUser'];
    $hoje = date('Ymd');
    


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (usuario,userSenha,userNome,userEmail,userCurso,userDTCadastro,userDTUltLogin,userTipo,userStatus,userEtecID) values ('".$usuario."','".$senha."','".$nome."','".$email."','".$curso."',".$hoje.",".$hoje.",'".$tipoUser."','Ativo',".$etecPolo.")"; 
    

    if ($conn->query($sql) === True) {
        $conn->close();
        header('Location: http://localhost/Etec/Frontend/TelaLogin.php?pass=2');
        exit;

    } else {
        $conn->close();
        header('Location: http://localhost/Etec/Frontend/CadastroUser.php?pass=1');
        exit;
    }
    ?>