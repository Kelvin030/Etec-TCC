<?php
session_start();
if (!isset($_SESSION['userID'])) {
    session_destroy();
    header('Location: http://localhost/Etec/Frontend/TelaLogin.php?pass=1');
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

            if ($row['alterProva'] == "Sim") {
                echo ($row['alterProva'] == "Sim") . " CERTO<br>";
                echo $row['alterProva']  . "<br>";
                $Acertos++;
            } else {
                echo ($row['alterProva'] == "Sim") . " ERRO<br>";
                echo $row['alterProva']  . "<br>";
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
    echo $value;
}





foreach ($_POST as &$value) {

};

echo $Acertos . "<br>";
echo $Erros;
$conn->close(); 