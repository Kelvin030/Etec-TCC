<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Pontos</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/simulados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <a href="./histoPontos.php" class="cliked">Historico de Pontos</a>
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


    <div class="conteiner">
        <div class="main">
            <h1>Historico de Pontos</h1>
            <h5>Segue relação de seus erros e acertos nas suas últimas provas/simulados</h5>

            <table>
                <thead>
                    <tr>
                        <th>Sequência</th>

                        <th>Usuário</th>

                        <th>Prova/Simulado</th>
                        
                        <th>Matéria</th>

                        <th>Erros</th>

                        <th>Acerto</th>
                        
                        <th>Data</th>

                    </tr>
                </thead>
                <tbody>
                    <?php


                    include '../Backend/conectaDB.php';

                    $con = new conectaDB();
                    $conn = $con->conecta();
                    $contador = 0;
                    $TipUser = "";
                    if ($_SESSION['userTipo'] == 'Estudante') {
                        $TipUser = " WHERE respostaprova.UserID = '".$_SESSION['userID']."'";

                    }

                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }


                    $sql = "SELECT userNome, provaNome, mateNome, QuantErros, QuantAcertos, DataResp FROM respostaprova INNER JOIN usuarios ON respostaprova.UserID = usuarios.userID INNER JOIN prova ON provaID = UserProva INNER JOIN materias ON provaMateria = mateID" . $TipUser;
                    
                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows > 0) {

                        while ($row = $resultado->fetch_assoc()):
                            $contador++;




                            echo '<tr>';

                            echo '<td>';
                            echo $contador;
                            echo '</td>';

                            echo '<td>';
                            echo $row['userNome'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['provaNome'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['mateNome'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['QuantErros'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['QuantAcertos'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['DataResp'];
                            echo '</td>';






                            echo '</tr>';


                        endwhile;
                    }
                    ?>
                </tbody>
            </table>
        </div>

</body>

</html>