<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);

    /* Verificar existencia usuário */

    if(!isset($classeClientes)){

        include "classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){



    }else{

        die("<script>window.location='php/deslogar.php'</script>");

    }

    /* //Verificar existencia usuário */
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    $idCliente = $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["iu_oj"]));

    $classeCompra->idCliente = $idCliente;
    
    ?>

    <title>Sacola - Oscar Jóias</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link type="text/css" rel="stylesheet" href="../lightslider/src/css/lightslider.css" /> -->                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="../lightslider/src/js/lightslider.js"></script> -->
    

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/sacola.css">
    <script src="jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>

        /* Mask */
        $(document).ready(function(){

            $('.maskCep').mask('00000-000');

        });

        function mudar_qtd_produto(qtd, id_sacola){

            window.location="php/mudarQtdProdutoCarrinho.php?id_sacola="+id_sacola+"&nova_qtd="+qtd;

        }

        function apagar_produto(id_sacola){

            window.location="php/apagarProdutoCarrinho.php?id_sacola="+id_sacola;

        }

        function verificar_campo_frete(){

            var campoFrete = document.getElementById("inputCalculaFrete");
            var botaoFinalizar = document.getElementById("botaoFinalizar");
            var selectFrete = document.getElementById("selectFrete");

            if(campoFrete.value == ""){

                campoFrete.focus();
                botaoFinalizar.classList.add("bg-danger");
                botaoFinalizar.innerHTML = "Calcule o frete";

                setTimeout(function(){ 
                    botaoFinalizar.classList.remove("bg-danger");
                    botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                }, 3000);

            }else{

                if(selectFrete.value == "vazio"){

                    selectFrete.classList.add("border");
                    selectFrete.classList.add("border-danger");
                    botaoFinalizar.classList.add("bg-danger");
                    botaoFinalizar.innerHTML = "Selecione o frete";

                    setTimeout(function(){ 
                        selectFrete.classList.remove("border");
                        selectFrete.classList.remove("border-danger");
                        botaoFinalizar.classList.remove("bg-danger");
                        botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                    }, 3000);

                }else{

                    var campoCidade = document.getElementById("inputCidade");
                    var campoEstado = document.getElementById("inputEstado");
                    var campoBairro = document.getElementById("inputBairro");
                    var campoRua = document.getElementById("inputEndereco");
                    var campoNumero = document.getElementById("inputNumero");

                    if(campoCidade.value == "" || campoEstado == "" || campoBairro.value == "" || campoRua.value == "" || campoNumero.value == ""){

                        botaoFinalizar.classList.add("bg-danger");
                        botaoFinalizar.innerHTML = "Preencha os campos *";
                        campoBairro.classList.add("border");
                        campoBairro.classList.add("border-danger");
                        campoRua.classList.add("border");
                        campoRua.classList.add("border-danger");
                        campoNumero.classList.add("border");
                        campoNumero.classList.add("border-danger");
                        campoCidade.classList.add("border");
                        campoCidade.classList.add("border-danger");
                        campoEstado.classList.add("border");
                        campoEstado.classList.add("border-danger");

                        setTimeout(function(){ 
                            botaoFinalizar.classList.remove("bg-danger");
                            botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                            campoBairro.classList.remove("border");
                            campoBairro.classList.remove("border-danger");
                            campoRua.classList.remove("border");
                            campoRua.classList.remove("border-danger");
                            campoNumero.classList.remove("border");
                            campoNumero.classList.remove("border-danger");
                            campoCidade.classList.remove("border");
                            campoCidade.classList.remove("border-danger");
                            campoEstado.classList.remove("border");
                            campoEstado.classList.remove("border-danger");
                        }, 3000);

                    }else{

                        var hiidenCodigoPS = document.getElementById('hiddenCodigo').value;

                        efetua_pedido();

                        abrir_pagseguro(hiidenCodigoPS);

                    }

                }

            }

        }

        function abrir_campo_endereco(){

            $(function(){

                $( "#campoEndereco" ).slideDown(300);

            })

        }

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center">

            <div class="col-md-9 pt-3 pb-3">

                <h1 class="fs-2 fw-light text-secondary">Minha Sacola</h1>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-9" id="fundoTituloProdutos">

                <span class="fs-5 text-white">PRODUTOS</span>

            </div>

        </div>

        <?php

        $i_preco = 0;
        $preco_total = 0;

        if($classeCompra->retorna_dados_carrinho() == false){

        ?>

        <div class="row justify-content-center">

            <div class="col-md-9 border-start border-end border-bottom">

                <div class="row mt-5 mb-5">

                    <div class="col text-center text-secondary">

                        SACOLA VAZIA

                    </div>

                </div>

            </div>

        </div>

        <?php

        }else{
        
        foreach($classeCompra->retorna_dados_carrinho() as $arrCompra){
        
        ?>

        <div class="row justify-content-center">

            <div class="col-md-9 border-start border-end border-bottom">

                <div class="row mb-3">

                    <div class="col">

                        <div class="row">

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 mt-3">

                                <img id="imgProduto" src="img/produtos/<?php echo $arrCompra["foto"] ?>" width="100%">

                            </div>

                            <div class="col-md-6 col-lg-6 mt-3">

                                <h2 class="fs-5 text-secondary"><?php echo $arrCompra["nome_produto"] ?></h2>

                                <ul class="fw-light text-secondary">

                                    <li class="<?php if($arrCompra["anel_unico"] == "SE"){ echo "d-none";} ?>"><b><?php if($arrCompra["anel_casal"] == "SE"){ echo "Tamanho aro"; }else{ echo "Aro feminino"; } ?>:</b> <?php echo $arrCompra["anel_unico"]; ?></li>
                                    <li class="<?php if($arrCompra["gravacao_anel_unico"] == "SE"){ echo "d-none";} ?>"><b><?php if($arrCompra["anel_casal"] == "SE"){ echo "Gravação"; }else{ echo "Gravação Feminina"; } ?>:</b> <?php if($arrCompra["gravacao_anel_unico"] == ""){ echo "(SEM GRAVAÇÃO)"; }else{ echo $arrCompra["gravacao_anel_unico"]; } ?></li>
                                    <li class="<?php if($arrCompra["anel_casal"] == "SE"){ echo "d-none";} ?>"><b>Aro Masculino:</b> <?php echo $arrCompra["anel_casal"]; ?></li>
                                    <li class="<?php if($arrCompra["gravacao_anel_casal"] == "SE"){ echo "d-none";} ?>"><b>Gravação masculina:</b> <?php if($arrCompra["gravacao_anel_casal"] == ""){ echo "(SEM GRAVAÇÃO)"; }else{ echo $arrCompra["gravacao_anel_casal"]; } ?></li>
                                    <li class="<?php if($arrCompra["apenas_aro"] == "SE"){ echo "d-none";} ?>"><b>Aro:</b> <?php echo $arrCompra["apenas_aro"]; ?></li>
                                    <li class="<?php if($arrCompra["apenas_gravacao"] == "SE"){ echo "d-none";} ?>"><b>Gravação:</b> <?php if($arrCompra["apenas_gravacao"] == ""){ echo "(SEM GRAVAÇÃO)"; }else{ echo $arrCompra["apenas_gravacao"]; } ?></li>
                                    <li class="<?php if($arrCompra["variacao_complementar"] == "SE"){ echo "d-none";} ?>"><b>Informação adicional:</b> <?php echo $arrCompra["variacao_complementar"]; ?></li>

                                </ul>

                            </div>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 mt-3">

                                <div class="text-secondary" id="apagarProduto">

                                    <img onclick="apagar_produto(<?php echo $arrCompra['id_sacola']; ?>)" src="img/lixeira.png" id="iconeApagar" width="17px">

                                </div>

                                <select class="mt-2 text-secondary" id="selectQtd" onchange="mudar_qtd_produto(this.value, <?php echo $arrCompra['id_sacola']; ?>)">

                                    <?php
                                    
                                    $i_select = 1;

                                    while($i_select <= $arrCompra["qtd_estoque"]){
                                    
                                    ?>
    
                                        <option value="<?php echo $i_select; ?>" <?php if($arrCompra["qtd_pedido"] == $i_select){ echo "selected"; } ?>>Qtd: <?php echo $i_select; ?></option>

                                    <?php

                                        $i_select++;
                                    
                                    }
                                    
                                    ?>
        
                                </select>
    
                            </div>

                            <?php
                            
                            $precoProdutoIndividual[$i_preco] = $arrCompra["qtd_pedido"] * $arrCompra["preco"];
                            
                            ?>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 fs-4 mt-3 text-secondary">

                                R$<?php echo number_format($precoProdutoIndividual[$i_preco], 2, ",", "."); ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php

        $preco_total += $precoProdutoIndividual[$i_preco];
        
        $i_preco++;

        }

        }
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-md-9">

                <div class="row">

                    <div class="col-5">

                        <button onclick="window.location='loja?pg=1'" type="button" class="btn btn-secondary" id="botaoComprarMais">Comprar mais</button>

                    </div>

                    <div class="col-7 text-end">

                        <a href="php/apagarProdutoCarrinho.php?limpar=sim" class="text-secondary me-5 d-none d-md-inline">Esvaziar Sacola</a>

                        <span class="text-secondary me-2">Total</span><span class="fs-4">R$<?php echo number_format($preco_total, 2, ",", ".") ?></span>

                        <div id="espacoPagseguro" class="text-secondary">Total c/frete R$<?php echo number_format($preco_total, 2, ",", ".") ?></div>

                        <div id="espacoNovaCompra"></div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-5">

            <div class="col-md-9">

                <div class="row justify-content-between">

                    <div class="col-md-5">

                        <!-- Calculo do frete -->
                        <div class="row justify-content-center">
        
                            <div class="col">
        
                                <label class="text-secondary" for="inputCalculaFrete">Digite seu CEP para calcular o frete</label><br>
                                <input onkeyup="abrir_campo_endereco()" type="text" id="inputCalculaFrete" class="maskCep" <?php if($classeCompra->retorna_dados_carrinho() == false){ echo "disabled"; } ?>>
        
                            </div>
        
                        </div>

                        <div class="row justify-content-center mt-4" id="areaFrete">

                            <!-- <div class="col text-center">

                                <select id="selectFrete" class="text-secondary">

                                    <option disabled selected hidden>Selecione o tipo de entrega</option>
                                    <option>Sedex: R$34,50 - 3 dias para entrega</option>
                                    <option>PAC: R$34,50 - 3 dias para entrega</option>

                                </select>

                                <br><br><b>Sedex:</b> R$34,50 - 3 dias para entrega<br>
                                <b>PAC:</b> R$34,50 - 3 dias para entrega

                            </div> -->

                        </div>

                        <script type="text/javascript">
                                                                                
                            function calcular_frete(cep) {
        
                                $.ajax({
        
                                    type: "POST",
                                    dataType: "html",
        
                                    url: "php/freteSacola.php",
        
                                    beforeSend: function () {
        
                                        $("#areaFrete").html("<img class='imgLoading' src='img/loading2.gif'>");
        
                                    },
        
                                    data: {cep: cep},
        
                                    success: function (msg) {
        
                                        $("#areaFrete").html(msg);
                                        $("#areaFrete").removeClass("d-none");
        
                                        /* setTimeout(function() {
                                            $("#areaIconeOk").html("");
                                            $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                        }, 3000); */
        
                                    }
        
                                });
        
                            }
        
                            $("#inputCalculaFrete").keyup(function(){
        
                                var cep = document.getElementById("inputCalculaFrete").value;
                                var campoCep = document.getElementById("areaFrete");
        
                                if(cep == ""){
        
                                    campoCep.classList.add("d-none");
        
                                }else{
        
                                    calcular_frete(cep);
        
                                }
        
                            });
        
                            </script>
                        <!-- //Calculo do frete -->
        
                    </div>
        
                    <div class="col-md-5">
        
                        <div class="row mt-4">
        
                            <div class="col">

                                <?php
                                
                                /* foreach($classeCompra->retorna_dados_carrinho() as $arrCarrinho){

                                    $produto[] = ["nome" => $arrCarrinho["nome_produto"], "preco" => $arrCarrinho["preco"], "qtd" => $arrCarrinho["qtd_pedido"], "id_produtos" => $arrCarrinho["id_produto"]];
                                
                                }

                                $codigoPagseguro = $classeCompra->pagseguro($produto); */
                                /* $codigoPagseguro = "065EA1E56868532BB4D1DF95CD639934"; */
                                
                                ?>

                                <div class="row" id="campoEndereco" style="display: none;">

                                    <div class="col">

                                        <div class="row">

                                            <div class="col fs-4">

                                                Endereço para entrega

                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-8">

                                                <label for="basic-url" class="form-label">Cidade <span class="text-danger">*</span></label>
                                                <input id="inputCidade" type="text" class="form-control form-control-sm">

                                            </div>

                                            <div class="col-4">

                                                <label for="basic-url" class="form-label">UF <span class="text-danger">*</span></label>
                                                <input id="inputEstado" type="text" class="form-control form-control-sm">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Bairro <span class="text-danger">*</span></label>
                                                <input id="inputBairro" type="text" class="form-control form-control-sm">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Rua <span class="text-danger">*</span></label>
                                                <input id="inputEndereco" type="text" class="form-control form-control-sm">

                                            </div>

                                        </div>

                                        <div class="row mt-2 mb-4">

                                            <div class="col-8">

                                                <label for="basic-url" class="form-label">Complemento</label>
                                                <input id="inputComplemento" type="text" class="form-control form-control-sm">

                                            </div>

                                            <div class="col-4">

                                                <label for="basic-url" class="form-label">Nº <span class="text-danger">*</span></label>
                                                <input id="inputNumero" type="number" class="form-control form-control-sm">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <script>

                                $("#inputCalculaFrete").keyup(function(){
                                //Início do Comando AJAX
                                    $.ajax({
                                        //O campo URL diz o caminho de onde virá os dados
                                        //É importante concatenar o valor digitado no CEP
                                        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                                        //Aqui você deve preencher o tipo de dados que será lido,
                                        //no caso, estamos lendo JSON.
                                        dataType: 'json',
                                        //SUCESS é referente a função que será executada caso
                                        //ele consiga ler a fonte de dados com sucesso.
                                        //O parâmetro dentro da função se refere ao nome da variável
                                        //que você vai dar para ler esse objeto.
                                        success: function(resposta){
                                            //Agora basta definir os valores que você deseja preencher
                                            //automaticamente nos campos acima.
                                            $("#inputEndereco").val(resposta.logradouro);
                                            $("#inputComplemento").val(resposta.complemento);
                                            $("#inputBairro").val(resposta.bairro);
                                            $("#inputCidade").val(resposta.localidade);
                                            $("#inputEstado").val(resposta.uf);
                                            //Vamos incluir para que o Número seja focado automaticamente
                                            //melhorando a experiência do usuário
                                            $("#inputNumeroCasa").focus();
                                        }
                                    });

                                    var imputCidade = document.getElementById("inputCidade");
                                    var imputEstado = document.getElementById("inputEstado");
                                    var imputBairro = document.getElementById("inputBairro");
                                    var imputRua = document.getElementById("inputEndereco");

                                    setTimeout(function(){ 
                                        
                                        if(imputCidade.value != ""){

                                            imputCidade.setAttribute("disabled", true);

                                        }else{

                                            imputCidade.removeAttribute("disabled", true);

                                        }

                                        if(imputEstado.value != ""){

                                            imputEstado.setAttribute("disabled", true);

                                        }else{

                                            imputEstado.removeAttribute("disabled", true);

                                        }

                                        if(imputBairro.value != ""){

                                            imputBairro.setAttribute("disabled", true);

                                        }else{

                                            imputBairro.removeAttribute("disabled", true);

                                        }

                                        if(imputRua.value != ""){

                                            imputRua.setAttribute("disabled", true);

                                        }else{

                                            imputRua.removeAttribute("disabled", true);

                                        }

                                    }, 1500);

                                    /* if(imputCidade.value != ""){

                                        imputCidade.setAttribute("disabled", true);

                                    }

                                    if(imputEstado.value != ""){

                                        imputEstado.setAttribute("disabled", true);

                                    }

                                    if(imputBairro.value != ""){

                                        imputBairro.setAttribute("disabled", true);

                                    }

                                    if(imputRua.value != ""){

                                        imputRua.setAttribute("disabled", true);

                                    } */

                                });

                                </script>
        
                                <!-- Botão comprar -->
                                <button onclick="verificar_campo_frete()" id="botaoFinalizar" <?php if($classeCompra->retorna_dados_carrinho() == false){ echo "disabled"; } ?>>FINALIZAR COMPRA</button>

                                <script type="text/javascript">
                                                                                
                                    function retorna_codigo_pagseguro(frete) {

                                        $(function(){

                                            $("#inputNumero").focus();

                                        })
                
                                        $.ajax({
                
                                            type: "POST",
                                            dataType: "html",
                
                                            url: "php/pagseguro.php",
                
                                            beforeSend: function () {
                
                                                $("#espacoPagseguro").html("<img src='img/loading.gif' width='50px'>");
                
                                            },
                
                                            data: {frete: frete},
                
                                            success: function (msg) {
                
                                                $("#espacoPagseguro").html(msg);
                
                                                /* setTimeout(function() {
                                                    $("#areaIconeOk").html("");
                                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                                }, 3000); */
                
                                            }
                
                                        });
                
                                    }
                
                                    /* $("#selectFrete").click(function(){
                
                                        var campoSelect = document.getElementById("selectFrete").value;

                                        retorna_codigo_pagseguro("44.50");
                
                                    }); */
            
                                </script>

                                <!-- Efetuar registro da compra -->
                                <script type="text/javascript">
                                                                                                                
                                    function efetua_pedido() {

                                        var cidade = document.getElementById("inputCidade").value;
                                        var estado = document.getElementById("inputEstado").value;
                                        var bairro = document.getElementById("inputBairro").value;
                                        var rua = document.getElementById("inputEndereco").value;
                                        var complemento = document.getElementById("inputComplemento").value;
                                        var numero = document.getElementById("inputNumero").value;
                                        var referencia = document.getElementById("hiddenReferencia").value;
                                        var cep = document.getElementById("inputCalculaFrete").value;

                                        $.ajax({

                                            type: "POST",
                                            dataType: "html",

                                            url: "php/novaCompra.php",

                                            /* beforeSend: function () {

                                                $("#espacoPagseguro").html("<img class='imgLoading' src='img/loading.gif' width='50px'>");

                                            }, */

                                            data: {cidade: cidade, estado: estado, bairro: bairro, rua: rua, complemento: complemento, numero: numero, referencia: referencia, cep: cep},

                                            success: function (msg) {

                                                $("#espacoNovaCompra").html(msg);

                                                /* setTimeout(function() {
                                                    $("#areaIconeOk").html("");
                                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                                }, 3000); */

                                            }

                                        });

                                    }

                                    $("#selectFrete").click(function(){

                                        var campoSelect = document.getElementById("selectFrete").value;

                                        retorna_codigo_pagseguro("44.50");

                                    });

                                </script>

                                <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                                <!-- <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script> -->

                                <script type="text/javascript">
                                
                                    function abrir_pagseguro(code){

                                        //Insira o código de checkout gerado no Passo 1
                                        /* var code = '065EA1E56868532BB4D1DF95CD639934'; */
                                        var callback = {
                                            success : function(transactionCode) {
                                                //Insira os comandos para quando o usuário finalizar o pagamento. 
                                                //O código da transação estará na variável "transactionCode"

                                                /* console.log("Compra feita com sucesso, código de transação: " + transactionCode); */

                                                window.location="pedidos";

                                            },
                                            abort : function() {
                                                //Insira os comandos para quando o usuário abandonar a tela de pagamento.
                                                /* console.log("abortado"); */

                                                var referencia = document.getElementById("hiddenReferencia").value;
                                                var id_cliente = "<?php echo $idCliente; ?>";

                                                window.location = "php/apagarPedidoAoCancelar.php?idU="+id_cliente+"&referencia="+referencia;

                                            }
                                        };
                                        //Chamada do lightbox passando o código de checkout e os comandos para o callback
                                        var isOpenLightbox = PagSeguroLightbox(code, callback);
                                        // Redireciona o comprador, caso o navegador não tenha suporte ao Lightbox
                                        if (!isOpenLightbox){
                                            location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
                                            console.log("Redirecionamento")
                                        }

                                    }

                                </script>
        
                            </div>
        
                        </div>
        
                    </div>

                </div>

            </div>

        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>
        
    </div>

</body>

</html>