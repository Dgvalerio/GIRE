<?php header("Content-Type: text/html; charset=UTF-8", true); $estado = 0;
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
        id      int not null auto_increment, 
        nome    varchar(100), 
        nMat    varchar(15), 
        curso   varchar(20), 
        ano     year, 
        turno   varchar(30), 
        email   varchar(30), 
        cpf     varchar(30), 
        usuario varchar(30),
        senha   varchar(30),
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

$result = mysqli_query($link, "select * from usuario where usuario = 'Doutor';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Doutor') {$estado = 1; } else { } }
if ($estado == 0) {
    $sql = "insert into usuario (usuario, nome, senha) values ('Doutor', 'O Doutor', 'theDoctor0');";
    if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_error($link) . "\n"; }
}

/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from girando;" );
if (!$result) { echo 'Erro: ' . mysqli_error($link) . "\n"; }

while ($confere = mysqli_fetch_assoc($result) ) {
    if ($confere['ip'] != $ipp) {
        print("<script> location.href = '../index.php'; </script>");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="../estilo/glyphicon.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-alpha.5/dist/css/bootstrap.min.css">
    <script src="../script/jquery-3.1.0.min.js"> </script>
    <script src="../bootstrap-4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="../script/js.js"> </script>
    <!-- Custom styles for this template -->
    <link href="../bootstrap-4.0.0-alpha.5/docs/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../estilo/01.css">
</head>
<body>
<div class="col-md-12 plT5" id="cBar"> </div>

    <div class="col-md-12 pl_6 my-1 p-0">

<nav class="navbar navbar-static-top navbar-light bg-faded">
    <a href="#" class="navbar-brand">Gire</a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Início (Eventos Disponíveis)<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Próximos Eventos</a>
        </li>
        <li class="nav-item pull-xs-right" id="btnExt">
            <a class="nav-link" href="ext.php">Sair</a>
        </li>

    </ul>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="first-slide" src="../0/24845.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-xs-left">
                    <h1>Exemplo de título.</h1>
                    <p>O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Inscreva-se hoje</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="../0/24903.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Outro exemplo de título.</h1>
                    <p>Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento. Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Aprender mais</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="../0/24909.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-xs-right">
                    <h1>Mais um para uma boa medida.</h1>
                    <p>Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. Clique em Inserir e escolha os elementos desejados nas diferentes galerias.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Navegar na galeria</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>
<div class="container marketing">
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="../0/24845.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Título</h2>
            <p>O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Ver detalhes &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="../0/24903.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Título</h2>
            <p>Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento. Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Ver detalhes &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="../0/24909.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Título</h2>
            <p>Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. Clique em Inserir e escolha os elementos desejados nas diferentes galerias.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Ver detalhes &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Primeiro título featurette. <span class="text-muted">Ele vai explodir sua mente.</span></h2>
            <p class="lead">O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid m-x-auto" data-src="../0/24845.jpg" src="../0/24845.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 push-md-5">
            <h2 class="featurette-heading">Ah, sim, isso é bom. <span class="text-muted">Veja por si mesmo.</span></h2>
            <p class="lead">Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento. Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si.</p>
        </div>
        <div class="col-md-5 pull-md-7">
            <img class="featurette-image img-fluid m-x-auto" data-src="../0/24903.jpg" src="../0/24903.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">E, por último, um presente. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. Clique em Inserir e escolha os elementos desejados nas diferentes galerias.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid m-x-auto" data-src="../0/24909.jpg" src="../0/24909.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <footer>
        <p class="pull-xs-right"><a href="#">Voltar para o Topo</a></p>
        <p>Outubro de 2016</p>
    </footer>

</div><!-- /.container -->

    </div>

<script src="../script/jquery-3.1.0.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../bootstrap-4.0.0-alpha.5/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="../bootstrap-4.0.0-alpha.5/docs/dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.0.0-alpha.5/docs/assets/js/vendor/holder.min.js"></script>
<script src="../bootstrap-4.0.0-alpha.5/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>