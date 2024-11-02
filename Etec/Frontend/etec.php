<?php
session_start();
if (!isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: ./TelaLogin.php?pass=1');
    exit();
}

include '../Backend/conectaDB.php';

$con = new conectaDB();
$conn = $con->conecta();

$sql = "select * FROM etecpolo WHERE etecID = '".$_SESSION['userEtecID']."'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    while ($row = $resultado->fetch_assoc()):
        $IdETEC = $row['etecID'];
        $Nome = $row['etecNome'];
        $Endereco = $row['etecEndereco'];
        $Contato = $row['etecContato'];
        $Cadastro = $row['etecCadastro'];


    endwhile;
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Informações do Usuário</title>
</head>

<body>
    <div class="navBar">
        <div class="navBarLeft">
            <a href="./Home.php">
                <div class="slogan">
                    <div>
                        <i class="fa fa-book" style="font-size:70px"></i>

                    </div>
                    <div>
                        <h1>ETEC Vestibulinho</h1>
                        <h2>Portal de Provas Anteriores</h2>
                    </div>
                </div>
            </a>
            <a href="./Provas.php">Provas</a>
            <a href="./Simulados.php">Simulados</a>
            <a href="./histoPontos.php">Historico de Pontos</a>
        </div>
        <div class="navBarright">
            <div class="infoUser">
                <div class="info">
                    <h3><?php
                        echo $_SESSION['usuario'];
                        ?></h3>
                    <h4><?php
                        echo $_SESSION['userTipo'];
                        ?></h4>
                </div>
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
    <div class="main">
        <h1>Informações da ETEC</h1>
        <div class="conteiner">
            <div class="item">
                <p class="label">ETEC ID:</p>
                <p class="data"><?php echo $IdETEC; ?></p>
            </div>
            <div class="item">
                <p class="label">Nome Polo:</p>
                <p class="data"><?php echo $Nome; ?></p>
            </div>
            <div class="item">
                <p class="label">Endereço:</p>
                <p class="data"><?php echo $Endereco; ?></p>
            </div>
            <div class="item">
                <p class="label">Contato:</p>
                <p class="data"><?php echo $Contato; ?></p>
            </div>
            <div class="item">
                <p class="label">Data Cadastro:</p>
                <p class="data"><?php echo $Cadastro; ?></p>
            </div>


        </div>
    </div>
</body>

</html>