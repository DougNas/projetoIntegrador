<?php

    /* Criação de função para pesquisa no banco de dados, utilizando infromações como ID, nome ou titulo da ação */

    session_start();
        require('conecta.php');
    
        if(!empty($_GET['search']))
        {
            $data = $_GET['search'];
            $sql = "SELECT * FROM tbplanaction WHERE acaoId LIKE '%$data%' or nome LIKE '%$data%' or titleAcao LIKE '%$data%' ORDER BY dataEncerra ASC";
        }
        else
        {
            $sql = "SELECT * FROM tbplanaction ORDER BY dataEncerra ASC";
        }
        $result = $conn->query($sql);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Douglas Nascimento">
    <meta name="keywords" content="planner, planejamento, agenda, atividade, grupos de trabalho">

    <title>Listar Ações</title>

    <link rel="icon" type="image/png" href="Image/iconeDev.png">

    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <!-- Barra de Navegação Flutuante, utilizando Bootstrap -->

    <div class="container mt-5"> 
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #040740">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html" style="color: blanchedalmond">Action Plan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cadastroAction.html" style="color: blanchedalmond">
                                Registrar Atividade  <img src="Image/agendamento.png" width="30">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listaAction.php" style="color: #F2DEA0">
                                Consultar  <img src="Image/algoritmo.png" width="30">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-5">

        <br>
        <h1 align=center>Listar Ações Cadastradas</h1>
        <br>
        <hr>

        <!-- Barra de pesquisa para filtro por termo procurado -->

        <div class="box-search" style="display: flex; justify-content: center; gap: .5%;">
            <input type="search" class="form-control w-25" placeholder="Filtre ação por cod, criador ou título" id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        
        <hr>

    </div>

    <div class="container mt-5">

    <!-- Inicio da tabela de apresentação dos dados listados. Cada ação apresentará um botão de edição e um de exclusão -->

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Aberto por:</th>
                <th scope="col">Data Inclusão</th>
                <th scope="col">Ação</th>
                <th scope="col">Prazo</th>
            </tr>
            </thead>
            <tbody>
            <tr>

            <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['acaoId']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['dataAbertura']."</td>";
                        echo "<td>".$user_data['titleAcao']."</td>";
                        echo "<td>".$user_data['dataEncerra']."</td>";
                        echo "<td>

                            <a class='btn btn-sm btn-primary' href='modifica.php?id=$user_data[acaoId]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='excluir.php?id=$user_data[acaoId]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>

                            </td>";
                        echo "</tr>";
                    }
                    ?>

            </tr>
            </tbody>
        </table>

        <br />
        <a href="index.html"><input type="button" class="btn btn-primary" value="Voltar"></a>

    </div>
                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'listaAction.php?search='+search.value;
    }
</script>


</html>