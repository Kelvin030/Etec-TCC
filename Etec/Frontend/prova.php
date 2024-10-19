<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/simulados.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    $current_page = $_SERVER['REQUEST_URI'];
    if (!isset($_SESSION['userID'])) {
        session_destroy();
        header('Location: http://localhost/Etec/Frontend/TelaLogin.php?pass=1');
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
    <form action="../Backend/EnviaProva.php" method="post">
        <?php
        include "../Backend/conectaDB.php";

        $con = new conectaDB();
        $conn = $con->conecta();
        $contador = 0;


        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }


        $sql = "SELECT * FROM questoes WHERE questProva = '" . $_GET['ID'] . "'";
        $resultado = $conn->query($sql);

        echo "<h1>".$_GET['name']."</h1>";
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()):
                $contador++;
                echo "<div class='pergunta'>";
                echo "<h2>Questão ".$contador."</h2>";
                echo "<p>" . $row['questPergunta'] . "</p>";
                
                
                $sql = "SELECT * FROM alternativa WHERE alterQuestao = '" . $row['questID'] . "'";
                $resultado2 = $conn->query($sql);
                if ($resultado2->num_rows > 0) {
                    while ($row2 = $resultado2->fetch_assoc()):
                        echo "<div class='alternativa'>";

                        echo '<input type="radio" id="'.$row2['alterID'].'" name="'.$row['questID'].'" value="'.$row2['alterID'].'">';
                        echo "<label for='".$row2['alterID']."'>" . $row2['alterAlternativa'] . "</label>";
                        echo "<br>";
                        echo "</div>";

                    endwhile;
                }


                echo "<hr>";
                echo "</div>";

            endwhile;
        }

        ?>
        <input type="submit" value="Enviar">
        <input type="reset" value="Reset">
    </form>

</body>

</html>