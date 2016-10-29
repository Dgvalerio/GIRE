<?php include_once 'ini.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-alpha.4/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.css"> -->
    <script src="script/jquery-3.1.0.min.js"> </script>
    <script src="bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="estilo/01.css">
    <script type="text/javascript" src="script/js.js"> </script>
    <script>
        setInterval('formLog()' ,500);
        function formLog() { if ($("#inpLog").val() == '' || $("#inpSen").val() == '') { $("#sW").html(''); } }

        $(document).keypress(function(e) { if(e.which == 13) $('#log').click(); });

        $(document).ready(function() {
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
<body class="container text-md-center plB0"> <br/>
<div class="col-md-12 plB5" id="cBar"> </div>
<div class="col-md-12 plB9 plC0" id="fBar">
    <header class="col-md-12"> <h1> g.i.r.e.</h1> <br/> </header>
    <section class="col-md-12"> <br/>
        <form action="#" method="post">
            <label for="inpLog"> Login </label> <input name="inpLog" id="inpLog" type="text"     class="form-control"><br/>
            <label for="inpSen"> Senha </label> <input name="inpSen" id="inpSen" type="password" class="form-control"><br/><br/>
            <div id="sW"> </div>
            <input type="button" id="log" value="Logar" class="btn btn-primary btn-block"> <br/>
            ou <br/>
            <br/>
            <input type="button" id="btnCad" value="Cadastrar" class="btn btn-primary" onclick="toLoc('cadastrar.php')"> <br/>
        </form>
    </section>
    <footer class="col-md-12"> <br/>
        <p> Outubro de 2016 </p>
    </footer>
</div>
</body>
</html>