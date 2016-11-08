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
$sql = "
    create table if not exists usuario (
        id      int not null auto_increment, 
        nome    varchar(100), 
        nMat    int, 
        curso   enum('I','ED','EL') NOT NULL,
        ano     int, 
        turno   enum('M','V') NOT NULL, 
        email   varchar(60), 
        cpf     int, 
        usuario varchar(30),
        senha   varchar(30),
        
        
        
        
        cursoofic int(11) DEFAULT NULL,
        primary key(id)
        UNIQUE KEY nMat (`mat`),
        UNIQUE KEY `cpf` (`cpf`),
        UNIQUE KEY `email` (`email`),
        KEY `cursoofic` (`cursoofic`)
    ) default charset = utf8;";
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

/*
    $sql = "
        create table if not exists `curso` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nome` varchar(60) NOT NULL,
            `descc` text NOT NULL,
            `descl` text NOT NULL,
            `vagas` int(11) NOT NULL,
            `area` enum('I','ED','EL') NOT NULL,
            `ch` int(11) NOT NULL,
            `horario` timestamp NOT NULL,
            `local` varchar(20) NOT NULL,
            `minist` int(11) DEFAULT NULL,
            `evento` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `minist` (`minist`),
            KEY `evento` (`evento`)
        ) default charset = utf8;
    ";

    $sql = "
        create table if not exists `evento` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nome` varchar(60) NOT NULL,
            `descr` text NOT NULL,
            PRIMARY KEY (`id`)
        ) default charset = utf8;
    ";

    $sql = "
        create table if not exists `ministrante` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nome` varchar(60) NOT NULL,
            `bio` text NOT NULL,
            PRIMARY KEY (`id`)
        ) default charset = utf8;
    ";

    $sql = "
        create table if not exists `usuario` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nome` varchar(60) NOT NULL,
            `mat` int(11) NOT NULL,
            `ano` int(11) NOT NULL,
            `curso` enum('I','ED','EL') NOT NULL,
            `senha` varchar(20) NOT NULL,
            `cpf` int(11) NOT NULL,
            `email` varchar(40) NOT NULL,
            `turno` enum('M','V') NOT NULL,
            `cursoofic` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `mat` (`mat`),
            UNIQUE KEY `cpf` (`cpf`),
            UNIQUE KEY `email` (`email`),
            KEY `cursoofic` (`cursoofic`)
        ) default charset = utf8;
    ";
*/

# Verificação do Usuário Principal
$result = mysqli_query($link, "select * from usuario where usuario = 'Doutor';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Doutor') {$estado = 1; } else { } }
if ($estado == 0) {
    $sql = "insert into usuario (usuario, nome, senha) values ('Doutor', 'O Doutor', 'theDoctor0');";
    if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_error($link) . "\n"; }
}

# Verificação do Login ativo
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from girando;" );
if (!$result) { echo 'Erro: ' . mysqli_error($link) . "\n"; } while ($confere = mysqli_fetch_assoc($result) ) {
    if ($confere['ip'] == $ipp) {
        print("<script> location.href = '_/index.php'; </script>");
    }
}
?>