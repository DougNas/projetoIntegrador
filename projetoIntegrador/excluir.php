<?php

    /* Procedimento para exclusão de registros */
    
    if(!empty($_GET['id']))
    {
        require("conecta.php");

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM tbplanaction WHERE acaoId=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM tbplanaction WHERE acaoId=$id";
            $resultDelete = $conn->query($sqlDelete);
        }
    }
    header('Location: listaAction.php');
   
?>