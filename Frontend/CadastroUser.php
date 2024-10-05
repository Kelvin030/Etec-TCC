<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/telaCadUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    $host = "localhost";
    $usuario = "root";
    $senha = "SQLadmin1234";
    $banco = "etecvestibulinho";


    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM etecpolo";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
    }

    ?>

    <a href="./TelaLogin.php">
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



    <div class="main">
        <div class="title">
            <h1>
                Cadastro De Usuário
            </h1>
        </div>
        <div class="line"></div>
        <form action="../Backend/cadastroUser.php" method="post">
            <div style="display: flex; gap: 5px;">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="twoInput">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required>

                <label for="senha">Senha:</label>
                <input type="text" name="senha" id="senha" required>

            </div>
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

            </div>


            <button type="reset" id="Reset">Reset</button>
            <button type="submit" id="submit">Confirmar</button>

        </form>
        <?php
                if (isset($_GET['pass'])) {
                    if ($_GET['pass'] == 1) {
                        echo '<p style="color: red; text-align: center;">Algo Deu errado!<br> Tente Novamente</p>';
                    }
                }
            ?>
    </div>

    <?php
    $conn->close();
    ?>
</body>

</html>