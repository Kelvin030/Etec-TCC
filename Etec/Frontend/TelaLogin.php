<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/telaLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="title">
            <div>
                <i class="fa fa-book" style="font-size:70px"></i>

            </div>
        <div>
            <h1>ETEC Vestibulinho</h1>
            <h2>Portal de Provas Anteriores</h2>

        </div>
        </div>
        <form action="../Backend/Login.php" method="post">
            <label for="Username">Usuário:</label>
            <input type="text" name="Username" id="Username" required>

            <label for="Userpassword">Senha:</label>
            <input type="password" name="Userpassword" id="Userpassword" required>
            
            <input type="submit" value="Login" id="submit">
            <?php
                if (isset($_GET['pass'])) {
                    if ($_GET['pass'] == 1) {
                        echo '<p style="color: red; text-align: center;">Senha ou Usuário Invalido!<br> Tente Novamente</p>';
                    }
                    if ($_GET['pass'] == 2) {
                        echo '<p style="color: green; text-align: center;">Cadastro Realizado com Sucesso!<br>Por favor, faça o login</p>';
                    }
                }
            ?>
        </form>
        <div class="others">
            <a href="./CadastroUser.php">Primeiro Acesso?</a>
            <a href="#">Esqueceu a Senha?</a>
        </div>
    </div>


</body>

</html>