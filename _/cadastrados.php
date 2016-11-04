<?php include_once 'ini.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>
    <link rel="shortcut icon" href="../Icone.ico" type="image/x-icon" />
    <link rel="icon" href="../Icone.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="../estilo/glyphicon.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-alpha.5/dist/css/bootstrap.min.css">
    <script src="../script/jquery-3.1.0.min.js"> </script>
    <script src="../bootstrap-4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="../script/js.js"> </script>
    <link href="../bootstrap-4.0.0-alpha.5/docs/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../estilo/01.css">
</head>

<body>

<div class="col-md-12 pl_55 p-0">
    <nav class="navbar navbar-static-top navbar-light bg-faded">
        <a class="navbar-brand" href="index.php"> <img src="../0/Logo.png" alt="GIRE" height="30rem"> </a>
        <ul class="nav navbar-nav">
            <li class="nav-item float-md-right">    <a class="nav-link" href="ext.php"> Sair            </a> </li>
        </ul>
    </nav>
    <br/>
    <div class="row col-md-12">
        <h1 class="h1 text-md-center">Curso</h1><br/>

  <?php header("Content-Type: text/html; charset=UTF-8",true);

                $result = mysqli_query($link, "select * from usuario");
                if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

                echo"<table class='table table-striped'>";
echo"<thead class='thead-inverse'> <tr> 
<th class='col-md-1'>#</th> 
<th class='col-md-3'>Usuário</th> 
<th class='col-md-3'>Nome de usuário</th> 
<th class='col-md-3'>Senha</th> 
<th class='col-md-2 cntr'>Apagar</th>
</tr> </thead> <tbody>";
                while ($exibe = mysqli_fetch_assoc($result) ) { // Obtém os dados da linha atual e avança para o próximo registro
echo"<tr> 
<th class='col-md-1' scope='row'>$exibe[id]</th> 
<td class='col-md-3'>$exibe[usuario]</td> 
<td class='col-md-3'>$exibe[nome]</td> 
<td class='col-md-3'>$exibe[senha]</td> 
<th align='center' class='col-md-2 glyphicons' onclick='subAction($exibe[id])'><div class='glyphicons-17-bin'></div></th>
</tr>";
                }
                echo"</tbody> </table>";
                mysqli_close($link);
                ?>
    </div>
</div> <br/>
<br/>
<footer class="col-md-12 plT5 text-md-center plC0"> <br/>
    <img src="../0/Logo_IF_Branco.png" alt="IF" height="110px"> <br/>
    <br/> <p class="float-xs-left"> Outubro de 2016 </p> <p class="float-xs-right"><a href="#">Voltar ao topo</a></p>
</footer>

</body>
</html>