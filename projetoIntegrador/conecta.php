<?php

    /* Realiza a conexão com o bando de dados MySQL */

    $servername = "localhost";
    $database = "dbplanner";
    $username = "root";
    $password = "";


    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

?>