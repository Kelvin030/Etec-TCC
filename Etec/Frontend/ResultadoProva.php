<?php
session_start();
$current_page = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: ./TelaLogin.php?pass=1');
    exit();
}

include "../Backend/conectaDB.php";

$con = new conectaDB();
$conn = $con->conecta();


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (!isset($_SESSION['IdProva'])) {
    $sql = "SELECT * FROM respostaprova WHERE UserID = '".$_SESSION['userID']."' ORDER BY DataResp DESC limit 1";
    $resultados = $conn->query($sql);
    if (($resultados->num_rows) > 0) {
        while ($row = $resultados->fetch_assoc()):
            $_SESSION['IdProva'] = $row['UserProva'];
            $_SESSION['nErros'] = $row['UserProva'];
            $_SESSION['nAcertos'] = $row['QuantAcertos'];
            
        endwhile;
    }else {
        $_SESSION['nErros'] = 0;
        $_SESSION['nAcertos'] = 0;
        
    }
}


if (isset($_SESSION['IdProva'])) {
    
    $sql = "SELECT provaNome FROM prova WHERE provaID = '" . $_SESSION['IdProva'] . "'";
    $resultados = $conn->query($sql);
    
    
    if (($resultados->num_rows) > 0) {
        while ($row = $resultados->fetch_assoc()):
            $provaNome = $row['provaNome'];
        endwhile;
    }
    
}else {
    $provaNome = 'Realize Uma Prova/Simulado';
}

if (isset($_SESSION['IdProva'])) {
    $url = "./prova.php?ID=" . $_SESSION['IdProva'] . "&name=" . $provaNome;
    
}else{
    
    $url = "./Home.php";
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Prova</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/simulados.css">
    <link rel="stylesheet" href="./css/resultProva.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div class="infos">
            <h1><?PHP echo $provaNome ?></h1>
            <div class="cards">
                <div class="card">
                    <p><?PHP echo $_SESSION['nAcertos'] ?></p>
                    <h3>Total de Acertos</h3>
                </div>

                <div class="card">
                    <p><?PHP echo $_SESSION['nErros'] ?></p>
                    <h3>Total de Erros</h3>
                </div>
            </div>
            <div class="buttons">
                <a href="<?PHP echo $url ?>" class='Again'>Tentar Novamente?</a>
                <a href="./Home.php" class='home'>Pagina inicial</a>
            </div>
        </div>

    </div>

</body>

</html>



<?PHP



if ($_GET['ID'] == 2) {
    $hoje = date('Ymd');
    
    $sql = "INSERT INTO respostaprova  (UserID, UserProva, QuantAcertos, QuantErros, DataResp) VALUES (" . $_SESSION['userID'] . ", ".$_SESSION['IdProva'].", ".$_SESSION['nAcertos'].", ".$_SESSION['nErros'].", ".$hoje.")";

    
    $resultados = $conn->query($sql);
    
    
    if ($resultados === TRUE) {
    } else {
        echo "Deu Errado! " . $conn->error;
    }
    
}


?>