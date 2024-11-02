<?php



include './conectaDB.php';

$con = new conectaDB();
$conn = $con->conecta();

$username = $_POST['Username'];
$password = $_POST['Userpassword'];


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE usuario ='" . $username . "' AND userSenha ='" . $password . "'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        session_start();
        $_SESSION['userID'] = $linha['userID'];
        $_SESSION['usuario'] = $linha['usuario'];
        $_SESSION['userEmail'] = $linha['userEmail'];
        $_SESSION['userCurso'] = $linha['userCurso'];
        $_SESSION['userTipo'] = $linha['userTipo'];
        $_SESSION['userStatus'] = $linha['userStatus'];
        $_SESSION['userEtecID'] = $linha['userEtecID'];
        $_SESSION['userNome'] = $linha['userNome'];
        $_SESSION['userDTcadas'] = $linha['userDTCadastro'];
    }
    header('Location: ../Frontend/Home.php?ID=' . $_SESSION['userID']);
    $conn->close();
    exit;
} else {
    $conn->close();
    header('Location: ../Frontend/TelaLogin.php?pass=1');
    exit;
}
