<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Pontos</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/simulados.css">
    <link rel="stylesheet" href="./css/Home.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php
    session_start();
    $current_page = $_SERVER['REQUEST_URI'];
    if (!isset($_SESSION['userID'])) {
        session_destroy();
        header('Location: ./TelaLogin.php?pass=1');
        exit();
    }
    ?>
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
            <a href="./Provas.php" >Provas</a>
            <a href="./Simulados.php">Simulados</a>
            <a href="./histoPontos.php" >Historico de Pontos</a>
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

        <a href="./cadastroMat.php">
            <div class="rightMain">
                <div class="card">
                    <i class="material-icons">school</i>
                    <h3>Matérias</h3>
                </div>
        </a>

        <a href="./cadastroProva.php">
            <div class="card">
            <i class="material-icons">collections_bookmark</i>
                <h3>Provas</h3>
            </div>
        </a>


        <a href="./cadastroQuestao.php">
            <div class="card">
            <i class="fa fa-pencil-square-o"></i>
            <h3>Questões</h3>
            </div>
        </a>

        <a href="../Backend/cadastroAlternativa.php">
            <div class="card">
            <i class="fa fa-check-square-o"></i>
            <h3>Alternativas</h3>
            </div>
        </a>
    </div>
    </div>




</body>

</html>