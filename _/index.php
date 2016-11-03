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

<div class="col-md-12 plT5" id="cBar"> </div>
<div class="col-md-12 pl_55 p-0">

<nav class="navbar navbar-static-top navbar-light bg-faded">
    <a class="navbar-brand">Gire</a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">            <a class="nav-link" href="#">       Início  </a> </li>
        <li class="nav-item float-md-right">    <a class="nav-link" href="ext.php"> Sair    </a> </li>
    </ul>
</nav>

<div id="divCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#divCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#divCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="first-slide" src="../0/24845.jpg" alt="Evento 1">
            <div class="container">
                <div class="carousel-caption text-xs-left">
                    <h1>Evento 1.</h1>
                    <p>Descrição do evento 1.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="../0/24903.jpg" alt="Evento 2">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Evento 2.</h1>
                    <p>Descrição do evento 2.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control"  href="#divCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"  aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#divCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>

<div class="container marketing">

    <div class="row featurette">
        <div class="col-md-7 push-md-5">
            <h2 class="featurette-heading">Evento. <span class="text-muted">Frase de efeito.</span></h2>
            <p class="lead">Descrição do evento.</p>
        </div>
        <div class="col-md-5 pull-md-7">
            <img class="featurette-image img-fluid mx-auto" data-src="../0/24909.jpg"  src="../0/24909.jpg"  alt="Imagem do evento 1." >
        </div>
    </div>

    <hr class="featurette-divider">

    <footer>
        <p class="float-xs-right"><a href="#">Voltar ao topo</a></p>
        <p> Outubro de 2016 </p>
    </footer>

</div>

</div>

</body>
</html>