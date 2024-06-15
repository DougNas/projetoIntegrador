<?php

    require("conecta.php");

    /* Após a conexão com o banco de dados, pagina insere as informações no banco de dados atraves de um insert into */

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $acao = $_POST['acao'];
    $urgencia = $_POST['urgencia'];
    $conclusao = $_POST['conclusao'];
    $detalhes = $_POST['detalhes'];

    $sql = "INSERT INTO tbplanaction (nome, email, titleAcao, urgencia, dataEncerra, descricaoAcao)
    VALUES ('$nome', '$email', '$acao', '$urgencia', '$conclusao', '$detalhes')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Ação Inserida com Sucesso</h1>";
        echo "<a href='cadastroAction.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>