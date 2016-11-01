<?php header("Content-Type: text/html; charset=UTF-8", true); $estado = 0; $test1 = 0; $usuario = ''; $id_usuario = 0;
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
    if ($confere['ip'] == $ipp) { $test1 = 1; $id_usuario = $usuario = $confere['userid']; break; }
}
$result = mysqli_query($link, "select * from usuario;" );
if (!$result) { echo 'Erro: ' . mysqli_error($link) . "\n"; }
while ($confere = mysqli_fetch_assoc($result) ) {
    if ($confere['id'] == $usuario) { $usuario = $confere['usuario']; break; }
}
if ($test1 == 0){ print("<script> location.href = '../index.php'; </script>"); }
?>