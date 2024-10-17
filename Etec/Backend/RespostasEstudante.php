<?php
    
    include './conectaDB.php';

    $con = new conectaDB();
    $conn = $con->conecta();

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    session_start();
    $sql = "SELECT * FROM respostausario WHERE = '".$_SESSION['userID']."'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {

        while ($row = $resultado->fetch_assoc()):
            $row['etecID'];                        
        endwhile;

    }
