<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <?php
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
        <div class="leftMain">
            <div class="grafico">
                <h3>Grafico de Evolução</h3>
                <div class="chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <a href="<?PHP echo $link; ?>">
            <div class="rightMain">
                <div class="card">
                    <i class="<?PHP echo $icon; ?>"><?PHP echo $iconSub; ?></i>
                    <h3><?PHP echo $title; ?></h3>
                </div>
        </a>

        <a href="./etec.php">
            <div class="card">
                <i class="material-icons">school</i>
                <h3>ETEC</h3>
            </div>
        </a>


        <a href="./usuario.php">
            <div class="card">
                <i class="fa fa-user"></i>
                <h3>Usuário</h3>
            </div>
        </a>

        <a href="../Backend/logoff.php">
            <div class="card">
                <i class="fa fa-sign-out"></i>
                <h3>Sair</h3>
            </div>
        </a>
    </div>
    </div>




    <script>
        const ctx = document.getElementById('myChart');
        <?PHP

        include "../Backend/conectaDB.php";

        $con = new conectaDB();
        $conn = $con->conecta();
        $acertos = 0;
        $erros = 0;


        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }


        $sql2 = "SELECT sum(QuantAcertos) Acertos, sum(QuantErros) Erros FROM respostaprova WHERE UserID = '".$_SESSION['userID']."'";
        $resultado2 = $conn->query($sql2);

        if (($resultado2->num_rows) > 0) {
            while ($row = $resultado2->fetch_assoc()):
                $acertos = $row['Acertos'];
                $erros = $row['Erros'];
            endwhile;
        }
        ?>

        const labels = ['Erros', 'Acertos'];

        const data2 = {
            labels: labels,
            datasets: [{
                label: 'Pontuações',
                data: [<?PHP echo $erros .",". $acertos ?>],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: data2
        });
    </script>
</body>

</html>