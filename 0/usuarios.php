<?php header("Content-Type: text/html; charset=UTF-8", true);
# Conexão
$link = mysqli_connect('localhost', 'root', '');
if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
# Criação do Banco de Cadastro
$sql = 'create database if not exists `gire` default character set utf8 collate utf8_general_ci;';
if (mysqli_query($link, $sql)) { } else { echo 'Erro criando o banco de dados: ' . mysqli_error($link) . "\n"; }
# Uso do Banco de Dados
$db_selected = mysqli_select_db($link, 'gire');
if (!$db_selected) { die ('Não é possível utilizar o banco de dados: ' . mysqli_error($link));  } else {echo ''; }

# Criação da Tabela Usuários
$sql = '
      create table if not exists usuario ( 
        id int not null auto_increment, 
        usuario varchar(30), 
        nome varchar(40), 
        senha varchar(30), 
        primary key(id)
      ) default charset = utf8;';
if (mysqli_query($link, $sql)) { } else { echo 'Erro ao criar a tabela Usuário: ' . mysqli_error($link) . "\n"; }

# Criação da Tabela Logins
$sql = '
      create table if not exists girando ( 
        id int not null auto_increment, 
        userid int not null, 
        ip varchar(40) not null, 
        hora int not null, 
        minuto int not null, 
        quando varchar(40), 
        primary key(id), 
        foreign key (userid) 
        references usuario(id) 
        ) default charset = utf8;';
if (mysqli_query($link, $sql)) { } else { echo 'Erro ao criar a tabela Girando: ' . mysqli_error($link) . "\n"; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.css"> -->
    <script src="../script/jquery-3.1.0.min.js"> </script>
    <script src="../bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../estilo/01.css">
</head>
<body class="container plB0"> <br/>
<div class="col-md-12 plB5" id="cBar"> </div>
<div class="col-md-12 plB9 plC0" id="fBar">
    <?php
    $result = mysqli_query($link, "select * from usuario");
    if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

    echo"<table class='table table-striped pC9 crPreta'>";
        echo"<thead class='thead-inverse'> <tr>
            <th class='col-md-1'>#</th>
            <th class='col-md-3'>Usuário</th>
            <th class='col-md-5'>Nome de usuário</th>
            <th class='col-md-3'>Senha</th>
        </tr> </thead> <tbody>";
        while ($exibe = mysqli_fetch_assoc($result) ) { // Obtém os dados da linha atual e avança para o próximo registro
        echo"<tr>
            <th class='col-md-1' scope='row'>$exibe[id]</th>
            <td class='col-md-3'>$exibe[usuario]</td>
            <td class='col-md-5'>$exibe[nome]</td>
            <td class='col-md-3'>$exibe[senha]</td>
        </tr>";
        }
        echo"</tbody> </table>";
    ?>
</div>
</body>
</html>