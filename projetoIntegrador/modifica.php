<?php

    /* Recupera informações do banco de dados a partir do ID e adiciona ao formulário */

    if(!empty($_GET['id']))
    {
        require('conecta.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM tbplanaction WHERE acaoId=$id";
        $result = $conn->query($sqlSelect);
        while($user_data = mysqli_fetch_assoc($result)){
            
            $id=$user_data['acaoId'];
            $nome=$user_data['nome'];
            $email=$user_data['email'];
            $titulo=$user_data['titleAcao'];
            $urgencia=$user_data['urgencia'];
            $dataEncerra=$user_data['dataEncerra'];
            $descricao=$user_data['descricaoAcao'];

        }
    
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Douglas Nascimento">
    <meta name="keywords" content="planner, planejamento, agenda, atividade, grupos de trabalho">

    <title>Atualizar Ação</title>

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

        <div align=center>
            <br>
            <h1 id="titulo">Consultar/Atualizar Ação</h1>
            <p id="subtitulo">Atualize os dados ou clique em "voltar" para tela anterior</p>
        </div>

    <!-- Inicio do formulário, que já terá um preenchimento prévio -->

        <form method="POST" action="editarAction.php?id=<?php echo $id;?>">

            <fieldset class="grupo">

                <div class="campo">
                    <label for="nome"><strong>Criado por:</strong></label>
                    <input type="text" name="nome" value=<?php echo $nome;?> class="shadow-lg p-1 mb-4 bg-body rounded" id="nome">
                </div>


                <div class="campo">
                    <label for="email"><strong>E-mail</strong></label>
                    <input type="email" name="email" value=<?php echo $email;?> class="shadow-lg p-1 mb-4 bg-body rounded" id="email">
                </div>
           
            </fieldset> 

            <div class="campo">
                <label for="acao"><strong>Ação</strong></label>
                <input type="text" name="acao" value=<?php echo $titulo;?> class="shadow-lg p-1 mb-4 bg-body rounded" id="acao">
            </div>

            <div class="campo">
                <label><strong>Urgencia atual da ação: <i><?php echo $urgencia;?></i></strong></label>
                <br>
                <label>
                    <input type="radio" name="urgencia" value="it_now" checked>Urgente - Do it now
                </label>
                <br>
                <label>
                    <input type="radio" name="urgencia" value="dicede_when">Urgente - Dicede when
                </label>
                <br>
                <label>
                    <input type="radio" name="urgencia" value="to_delegate">Não Urgente - To delegate
                </label>
                <br>
                <label>
                    <input type="radio" name="urgencia" value="to_discart">Não Urgente - To discart
                </label>
            </div>

            <br>

            <div class="campo">
                <label for="conclusao"><strong>Data da Conclusão</strong></label>
                <input type="date" name="conclusao" value=<?php echo $dataEncerra;?> class="shadow-lg p-1 mb-4 bg-body rounded" id="conclusao">
            </div>

            <div class="campo">
                <label for="experiencia"><strong>Atualize os detalhes a ação: </strong></label>
                <br>
                <textarea rows="6" style="width: 26em" class="shadow-lg p-3 mb-5 bg-body rounded" id="detalhes" name="detalhes"><?php echo $descricao;?></textarea>
            </div>

            <div style="display: flex; gap: .5%;">
                <div class="campo">
                    <a href="index.html">
                        <input type='button' value='Voltar' class="botao btn btn-primary btn-lg"> 
                    </a>
                </div>
                <div class="campo">
                    <button class="botao btn btn-primary btn-lg" type="submit" onsubmit="">Atualizar</button>            
                </div>

            </div>

        </form>

    <!-- Formulário chama o editarAction.php -->
     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>