<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Materias</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/cadastroMat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php

    include '../Backend/conectaDB.php';

    $con = new conectaDB();
    $conn = $con->conecta();


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM materias";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
    }

    session_start();
    if (!isset($_SESSION['userID'])) {
        session_destroy();
        header('Location: ./TelaLogin.php?pass=1');
        exit();
    }

    $link = "./ResultadoProva.php?ID=1";
    $icon = "material-icons";
    $iconSub = "library_books";
    $title = "Última Prova/Simulado";

    if ($_SESSION['userTipo'] <> 'Estudante') {
        $link = "./cadProva.php  ";
        $icon = "fa fa-edit";
        $title = "Cadastro Prova/Simulado";
        $iconSub = "";
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




    <div class="main">
        <div class="title">
            <h1>
                Cadastro De Prova
            </h1>
        </div>
        <div class="line"></div>

        <div class="conteinerForms">
            <form action="../Backend/cadastroProva.php" method="post">
                <div style="display: flex; gap: 5px;">

                    <label for="nome">Nome Prova:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                
                <div class="twoInput">
                    <label for="Status" >Status:</label>

                    <select name="Status" id="Status">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                    <label for="Materia" >Matéria:</label>

                    <select name="Materia" id="Materia">
                    <?php
                        while ($row = $resultado->fetch_assoc()):
                        ?>
                            <option value="<?php echo $row['mateID']; ?>"><?php echo $row['mateNome']; ?></option>
                        <?php endwhile; ?>
                    </select>

                    
                </div>
<!-- 
                <div class="twoInput">
                    <label for="curso">Curso:</label>
                    <input type="text" name="curso" id="curso" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="twoInput">
                    <select name="etecPolo" id="etecPolo">
                        <?php
                        while ($row = $resultado->fetch_assoc()):
                        ?>
                            <option value="<?php echo $row['etecID']; ?>"><?php echo $row['etecNome']; ?></option>
                        <?php endwhile; ?>
                    </select>

                    <select name="tipoUser" id="tipoUser">
                        <option value="Estudante">Estudante</option>
                        <option value="Professor">Professor</option>
                    </select>

                </div> -->


                <button type="reset" id="Reset">Reset</button>
                <button type="submit" id="submit">Confirmar</button>

            </form>
        </div>
        <?php
        if (isset($_GET['pass'])) {
            if ($_GET['pass'] == 1) {
                echo '<p style="color: red; text-align: center;">Algo Deu errado!<br> Tente Novamente</p>';
            }
            if ($_GET['pass'] == 2) {
                echo '<p style="color: green; text-align: center;">Prova Cadastrada Com Sucesso!!!</p>';
            }
        }
        ?>
    
    </div>

    <?php
    $conn->close();
    ?>
</body>

</html>