<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulados</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/simulados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    $current_page = $_SERVER['REQUEST_URI'];

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
            <a href="./Provas.php">Provas</a>
            <a href="./Simulados.php" class="cliked">Simulados</a>
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

    <div class="conteiner">
        <div class="main">
            <h1>Simulados</h1>
            <h5>Selecione um simulado para ser realizado</h5>

            <table>
                <thead>
                    <tr>
                        <th>Sequência</th>

                        <th>Nome Simulado</th>

                        <th>Data de Cadastro</th>

                        <th>Status</th>

                        <th>Matéria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    include '../Backend/conectaDB.php';

                    $con = new conectaDB();
                    $conn = $con->conecta();
                    $contador = 0;
                    $url = "";

                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }


                    $sql = "SELECT prova.*, mateNome  FROM prova INNER JOIN materias ON provaMateria = mateID WHERE provaMateria = 1";
                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows > 0) {

                        while ($row = $resultado->fetch_assoc()):
                            $url = "./Simulado.php?ID=".$row['provaID'];
                            $contador++;




                            echo '<tr>';

                            echo '<td>';
                            echo '<a href="'.$url.'">';
                            echo $contador;
                            echo '</a>';
                            echo '</td>';

                            echo '<td>';
                            echo '<a href="'.$url.'">';
                            echo $row['provaNome'];
                            echo '</a>';
                            echo '</td>';

                            echo '<td>';
                            echo '<a href="'.$url.'">';
                            echo  $row['provaCadastro'];
                            echo '</a>';
                            echo '</td>';

                            echo '<td>';
                            echo '<a href="'.$url.'">';
                            echo $row['provaStatus'];
                            echo '</a>';
                            echo '</td>';

                            echo '<td>';
                            echo '<a href="'.$url.'">';
                            echo $row['mateNome'];
                            echo '</a>';
                            echo '</td>';

                            echo '</tr>';


                        endwhile;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>