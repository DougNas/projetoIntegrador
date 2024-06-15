<?php

    if(!empty($_GET['id']))
    {
        require("conecta.php");

        $id = $_GET['id'];
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $acao = $_POST['acao'];
        $urgencia = $_POST['urgencia'];
        $conclusao = $_POST['conclusao'];
        $detalhes = $_POST['detalhes'];

    $sql = "UPDATE tbplanaction SET nome='$nome', 
                                email='$email', 
                                titleAcao='$acao', 
                                urgencia='$urgencia', 
                                dataEncerra='$conclusao', 
                                descricaoAcao='$detalhes' 
            WHERE acaoId=$id;";

        if ($conn->query($sql) === TRUE) {
            echo "<center><h1>Ação atualizada com Sucesso</h1>";
            echo "<a href='listaAction.php'><input type='button' value='Voltar'></a></center>";
        } else {
            echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
        }
    
    }
    
?>