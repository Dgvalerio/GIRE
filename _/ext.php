<?php header("Content-Type: text/html; charset=UTF-8",true);

# Conexão
$link = mysqli_connect('localhost', 'root', '');
if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
# Uso do Banco de Dados
$db_selected = mysqli_select_db($link, 'gire');
if (!$db_selected) { die ('Não é possível utilizar o banco de dados: ' . mysqli_error($link));  } else {echo ''; }

# Example use of getenv() $ipp = getenv("REMOTE_ADDR");
# Or simply use a Superglobal ($_SERVER or $_ENV)
            $ipp = $_SERVER["REMOTE_ADDR"];

$sql = "delete from girando where ip = '$ipp'; ";
if (mysqli_query($link, $sql)) { } else { echo 'Não é possível sair: ' . mysqli_error($link); }

print("<script> location.href = '../index.php'; </script>");
?>