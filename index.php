<?php include_once 'ini.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>
    <link rel="shortcut icon" href="Icone.ico" type="image/x-icon" />
    <link rel="icon" href="Icone.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-alpha.5/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.css"> -->
    <script src="script/jquery-3.1.0.min.js"> </script>
    <script src="bootstrap-4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="estilo/01.css">
    <script type="text/javascript" src="script/js.js"> </script>
    <script>
        setInterval('formLog()' ,500);
        function formLog() { if ($("#inpLog").val() == '' || $("#inpSen").val() == '') { $("#sW").html(''); } }

        $(document).keypress(function(e) { if(e.which == 13) $('#log').click(); });

        $(document).ready(function() {
            $('#secNorm').collapse('show');
            $("#btnEnt").click(function() {
                $('#secNorm').collapse('hide');
                $('#secEntrar').collapse('show');
            });
            $("#btnVol").click(function() {
                $('#secNorm').collapse('show');
                $('#secEntrar').collapse('hide');
            });
            $("#log").click(function() {
                var inpLog = $("#inpLog"); var inpLogPost = inpLog.val();
                var inpSen = $("#inpSen"); var inpSenPost = inpSen.val();
                if (inpLogPost == '' || inpSenPost == '') { $("#sW").html('');
                    alert ('Por favor, preencha todos os campos!'); } else {
                    $.post("log.php", {inpLog: inpLogPost, inpSen: inpSenPost}, function(data){ $("#sW").html(data); }, "html");
                }
            });
        });
    </script>
</head>
<body class="container text-md-center plBG0"> <br/>
    <header class="col-md-12 plT5"> <br/> <img src="0/Logo_Nome_Branco.png" alt="GIRE" height="110px"> <br/> <br/> </header>

    <div class="col-md-12 plT5 p-0">
        <div class="col-md-12 pl_55" id="fBar">
        <section class="col-md-12 collapse" id="secNorm">
            <div class="col-md-12">
                <input type="button" id="verEvt" value="Ver eventos" class="btn btn-primary btn-block" onclick="toLoc('_/index.php')"> <br/>
            </div>
            <div class='btn-group col-md-12' role='group'>
                <input type="button" id="btnCad" value="Cadastrar" class="btn btn-primary col-md-6" onclick="toLoc('cadastrar.php')">
                <input type="button" id="btnEnt"    value="Entrar"    class="btn btn-primary col-md-6">
            </div>
        </section>
        <section class="col-md-12 collapse" id="secEntrar">
            <br/>
            <form action="#" method="post">
                <label for="inpLog"> Login </label> <input name="inpLog" id="inpLog" type="text"     class="form-control"><br/>
                <label for="inpSen"> Senha </label> <input name="inpSen" id="inpSen" type="password" class="form-control"><br/><br/>
                <div id="sW"> </div>
                <input type="button" id="log" value="Logar" class="btn btn-primary btn-block"> <br/>
                <br/>
                <br/>
                <input type="button" id="btnVol" value="Voltar" class="btn btn-danger"> <br/>
            </form>
        </section>
        </div>
    </div>

    <footer class="col-md-12 plT5"> <br/>
        <img src="0/Logo_IF_Branco.png" alt="IF" height="110px"> <br/>
        <br/>
    </footer>
</body>
</html>