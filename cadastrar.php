<?php include_once 'ini.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E. </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-alpha.5/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.css"> -->
    <script src="script/jquery-3.1.0.min.js"> </script>
    <script src="bootstrap-4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/jquery.maskedinput-1.1.4.pack.js"/></script>
    <!-- <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="estilo/01.css">
    <script type="text/javascript" src="script/js.js"> </script>
    <script>
        $(document).keypress(function(e) { if(e.which == 13) $('#btnCad').click(); });

        function validacaoEmail(field) {

            if ($("#inpEma").val() == ""){
                $('#pEStatus').collapse('hide');
            }

            usuario = field.value.substring(0, field.value.indexOf("@"));
            dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
            if ((usuario.length >=1) &&
                (dominio.length >=3) &&
                (usuario.search("@")==-1) &&
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) &&
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&
                (dominio.indexOf(".") >=1)&&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
                $('#pEStatus').collapse('show');
                document.getElementById('pEStatus').innerHTML = "Email válido!";
                $('#pnEStatus').css({"background-color": "#34cc33", "transition": "all .5s"});
            }
            else{
                $('#pEStatus').collapse('show');
                document.getElementById('pEStatus').innerHTML = "Email inválido!";
                $('#pnEStatus').css({"background-color": "#ff0028", "transition": "all .5s"});
            }
        }

            function verificaSenha() {
                if (($("#inpSen").val() != $("#inpCSen").val())) {
                    if (($("#inpSen").val() != "" && $("#inpCSen").val() != "")) {
                        $('#pStatus').collapse('show');
                        document.getElementById('pStatus').innerHTML = "As senhas não conferem!";
                        $('#pnStatus').css({"background-color": "#ff0028", "transition": "all .5s"});
                    }
                    else{
                        $('#pStatus').collapse('hide');
                    }
                } else {
                    if (($("#inpSen").val() != "" && $("#inpCSen").val() != "")) {
                        $('#pStatus').collapse('show');
                        document.getElementById('pStatus').innerHTML = "As senhas conferem!";
                        $('#pnStatus').css({"background-color": "#34cc33", "transition": "all .5s"});
                    }
                    else{
                        $('#pStatus').collapse('hide');
                    }
                }
            }

        $(document).ready(function() {
            $("#inpCpf").mask("999.999.999-99");

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
<body class="container text-md-center plBG0"> <br/>
<header class="col-md-12 plT5"> <br/> <img src="0/Logo_Nome_Branco.png" alt="GIRE" height="110px"> <br/> <br/> </header>

<div class="col-md-12 plT5 p-0">
    <div class="col-md-12 pl_55" id="fBar">
    <section class="col-md-12"> <br/>
        <form action="#" method="post" name="formcad">
            <label for="inpNom"> Nome Completo          </label> <input name="inpNom" id="inpNom" type="text"       class="form-control"><br/>
            <label for="inpNMa"> Número de Matrícula    </label> <input name="inpNMa" id="inpNMa" type="number"     class="form-control"><br/>
            <label for="inpCur"> Curso </label>
            <select name="inpCur" id="inpCur" class="form-control">
                <option value=""> (Clique para selecionar)  </option>
                <option value="1"> Edificações              </option>
                <option value="2"> Eletrotécnica            </option>
                <option value="3"> Informática              </option>
            </select><br/>
            <label for="inpAno"> Ano/Semestre           </label>
            <select name="inpAno" id="inpAno" class="form-control">
                <option value=""> (Clique para selecionar)  </option>
                <option value="1"> 1° ano                 </option>
                <option value="2"> 2° ano                 </option>
                <option value="3"> 3° ano                 </option>
                <option value="4"> 4° ano                 </option>
            </select><br/>
            <label for="inpTur"> Turno                  </label>
            <select name="inpTur" id="inpTur" class="form-control">
                <option value=""> (Clique para selecionar)  </option>
                <option value="1"> Matutino                 </option>
                <option value="2"> Vespertino               </option>
            </select><br/>
            <label for="inpEma"> Email                  </label> <input name="inpEma" id="inpEma" type="email"      class="form-control" onchange="validacaoEmail(formcad.inpEma)">
            <div id="pnEStatus"><span id="pEStatus"></span></div><br/>
            <label for="inpCpf"> CPF                    </label> <input name="inpCpf" id="inpCpf" type="text"       class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                                                        title="Digite o CPF no formato nnn.nnn.nnn-nn""><br/>
            <label for="inpLog"> Login                  </label> <input name="inpLog" id="inpLog" type="text"       class="form-control"><br/>
            <label for="inpSen"> Senha                  </label> <input name="inpSen" id="inpSen" type="password"   class="form-control" onchange="verificaSenha()"><br/>
            <label for="inpCSen"> Confirme a sua senha                  </label> <input name="inpCSen" id="inpCSen" type="password"   class="form-control" onchange="verificaSenha()">
            <div id="pnStatus"><span id="pStatus"></span></div><br/>

            <input type="button" value="Ação" class="btn btn-primary btn-block" onclick="maskara()"> <br/>

            <div id="sW"> </div>
            <input type="button" id="btnCad" value="Cadastrar" class="btn btn-primary btn-block"> <br/>
            ou <br/> <br/>
            <input type="button" value="Cancelar" class="btn btn-danger btn-block" onclick="toLoc('index.php')"> <br/>
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