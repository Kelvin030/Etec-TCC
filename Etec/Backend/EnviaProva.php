<?php
session_start();
if (!isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: ../Frontend/TelaLogin.php?pass=1');
    exit();
}

include "./conectaDB.php";

$con = new conectaDB();
$conn = $con->conecta();
$contador = 0;
$Acertos = 0;
$Erros = 0;
$hoje = date('Ymd');
$sql2 = "";

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$ProvaID = array_pop($_POST);

foreach ($_POST as &$value) {
    $sql2 = "SELECT alterQuestao, alterProva, alterCorreta FROM alternativa WHERE alterID = '".$value."'";
    $resultado2 = $conn->query($sql2);

    if (($resultado2->num_rows) > 0) {
        while ($row = $resultado2->fetch_assoc()):
            $alterQuestao = $row['alterQuestao'];
            $alterProva = $row['alterProva'];

            if ($row['alterCorreta'] == "Sim") {
                echo "CERTOU<br>";
                echo $row['alterQuestao']  . "<br>";
                $Acertos++;
            } else {
                echo "ERROU<br>";
                echo $row['alterQuestao']  . "<br>";
                $Erros++;
            }
            
        endwhile;
    }

    $sql = "INSERT INTO respostausario VALUES (" . $_SESSION['userID'] . ", ".$value.", '".$hoje."', ".$alterQuestao.", ".$alterProva.")";
   
   
    $resultado = $conn->query($sql);

    if ($resultado === TRUE) {

    } else {
        echo "Deu Errado! " . $conn->error; 
    }
}

$_SESSION['nAcertos'] = $Acertos;
$_SESSION['nErros'] = $Erros;
$_SESSION['IdProva'] = $ProvaID;


header('Location: ../Frontend/ResultadoProva.php?ID=2');

$conn->close(); 