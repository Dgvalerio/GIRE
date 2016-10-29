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
        $(document).keypress(function(e) { if(e.which == 13) $('#btnCad').click(); });

        $(document).ready(function() {
            $("#btnCad").click(function() {
                var inpNom = $("#inpNom"); var inpNomPost = inpNom.val();
                var inpNMa = $("#inpNMa"); var inpNMaPost = inpNMa.val();
                var inpCur = $("#inpCur"); var inpCurPost = inpCur.val();
                var inpAno = $("#inpAno"); var inpAnoPost = inpAno.val();
                var inpTur = $("#inpTur"); var inpTurPost = inpTur.val();
                var inpEma = $("#inpEma"); var inpEmaPost = inpEma.val();
                var inpCpf = $("#inpCpf"); var inpCpfPost = inpCpf.val();
                var inpLog = $("#inpLog"); var inpLogPost = inpLog.val();
                var inpSen = $("#inpSen"); var inpSenPost = inpSen.val();

                if (
                    inpLogPost == '' ||
                    inpSenPost == '' ||
                    inpNomPost == '' ||
                    inpNMaPost == '' ||
                    inpCurPost == '' ||
                    inpAnoPost == '' ||
                    inpTurPost == '' ||
                    inpEmaPost == '' ||
                    inpCpfPost == ''
                ) { $("#sW").html(''); alert ('Por favor, preencha todos os campos!');
                } else {
                    $.post("cad.php", {
                        inpLog: inpLogPost,
                        inpSen: inpSenPost,
                        inpNom: inpNomPost,
                        inpNMa: inpNMaPost,
                        inpCur: inpCurPost,
                        inpAno: inpAnoPost,
                        inpTur: inpTurPost,
                        inpEma: inpEmaPost,
                        inpCpf: inpCpfPost
                    },  function(data){ $("#sW").html(data); }, "html");
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
            <label for="inpNom"> Nome Completo          </label> <input name="inpNom" id="inpNom" type="text"       class="form-control"><br/>
            <label for="inpNMa"> Número de Matrícula    </label> <input name="inpNMa" id="inpNMa" type="number"     class="form-control"><br/>
            <label for="inpCur"> Curso </label>
            <select name="inpCur" id="inpCur" class="form-control">
                <option value=""> (Clique para selecionar)  </option>
                <option value="1"> Edificações              </option>
                <option value="2"> Eletrotécnica            </option>
                <option value="3"> Informática              </option>
            </select><br/>
            <label for="inpAno"> Ano/Semestre           </label> <input name="inpAno" id="inpAno" type="date"       class="form-control"><br/>
            <label for="inpTur"> Turno                  </label>
            <select name="inpTur" id="inpTur" class="form-control">
                <option value=""> (Clique para selecionar)  </option>
                <option value="1"> Matutino                 </option>
                <option value="2"> Vespertino               </option>
            </select><br/>
            <label for="inpEma"> Email                  </label> <input name="inpEma" id="inpEma" type="email"      class="form-control"><br/>
            <label for="inpCpf"> CPF                    </label> <input name="inpCpf" id="inpCpf" type="text"       class="form-control"><br/>
            <label for="inpLog"> Login                  </label> <input name="inpLog" id="inpLog" type="text"       class="form-control"><br/>
            <label for="inpSen"> Senha                  </label> <input name="inpSen" id="inpSen" type="password"   class="form-control"><br/>

            <div id="sW"> </div>
            <input type="button" id="btnCad" value="Cadastrar" class="btn btn-primary btn-block"> <br/>
            ou <br/> <br/>
            <input type="button" value="Cancelar" class="btn btn-danger btn-block" onclick="toLoc('logar.php')"> <br/>
        </form>
    </section>
    <footer class="col-md-12"> <br/> <p> Outubro de 2016 </p> </footer>
</div>
</body>
</html>