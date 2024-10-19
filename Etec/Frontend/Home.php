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

    <div class="main">
        <div class="leftMain">
            <div class="grafico">
                <h3>Grafico de Evolução</h3>
                <div class="chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        
        <a href="">
            <div class="rightMain">
                <div class="card">
                    <i class="material-icons">library_books</i>
                    <h3>Última Prova/Simulado</h3>
                </div>
        </a>
            <div class="card">
            <i class="material-icons">school</i>
                <h3>ETEC</h3>
            </div>
            <div class="card">
            <i class="fa fa-user"></i>
                <h3>Usuário</h3>
            </div>

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
        

        const labels = ['1', '2', '3', '4', '5', '6', '7'];

        const data2 = {
            labels: labels,
            datasets: [{
                label: 'Pontuações',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        new Chart(ctx, {
            type: 'line',
            data: data2
        });
    </script>
</body>

</html>