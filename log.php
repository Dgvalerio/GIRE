<?php header("Content-Type: text/html; charset=UTF-8",true);
$tst_one = 0; $tst_two = 0; $conf_senha = ''; $idUser = 0;
# Conexão
    $link = mysqli_connect('localhost', 'root', '');
    if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };

# Uso do Banco de Dados
    $db_selected = mysqli_select_db($link, 'gire');
    if (!$db_selected) { die ('Não é possível utilizar o banco de dados: ' . mysqli_error($link));  } else {echo ''; }

# Pega dos valores para o Login
    $vuser	= $_POST ["inpLog"]; $vsenha = $_POST ["inpSen"];

date_default_timezone_set('America/Sao_Paulo'); $quando = date('Y-m-d H:i'); $hora = date('H'); $minuto = date('i');
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];

    $result = mysqli_query($link, "select * from usuario;"); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == $vuser)  { $tst_one = 2; $idUser = $confere['id']; $conf_senha = $confere['senha']; break; } else { $tst_one = 1; } }

$err = " <script> $('#fBar').css({ 'background-color': '#d9534f' }); </script> ";
$scs = " <script> $('#fBar').css({ 'background-color': '#449d44' }); </script> ";

    if ($tst_one == 1) { print "$err
            <h4 class='card-title'>O Usuário <i>$vuser</i> não existe!</h4> <br/>
    "; } else if ($tst_one == 2) { if ($conf_senha == $vsenha) { $tst_two = 1; } else { $tst_two = 2; } }

    if ($tst_two == 2) { print " $err
            <h4 class='card-title'>A Senha de <i>$vuser</i> está errada!</h4> <br/>
    "; } else if ($tst_two == 1) {
        $sql = "insert into girando (userid, ip, hora, minuto, quando) values ('$idUser', '$ipp', '$hora', '$minuto', '$quando');";
        if (mysqli_query($link, $sql)) { } else { echo 'Erro:' . mysqli_error($link); }
    print(" $scs
        <script> location.href = '_/index.php'; </script>
            <h4 class='card-title'>Login com <i>$vuser</i> correto!</h4> 
        <br/>
     ");
    }
?>