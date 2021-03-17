<html>

<head>

    <?php
    
    include "./classes/produtos.class.php";
    $classeProdutos = new produtos();

    $idProduto = $_GET["produto"];

    $classeProdutos->id = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $idProduto);
    
    ?>

    <title>Painel administrador - Oscar Jóias e Acessórios</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" /> -->                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="lightslider/src/js/lightslider.js"></script> -->

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <!-- FlexDatalist -->
    <link href="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.js"></script>

    <link rel="stylesheet" href="css/adm_editar_produto.css">

    <?php
    
    foreach($classeProdutos->retorna_dados_produto_pelo_id() as $arrProduto){
    
    ?>

    <script>
        
        function aparecerVariacoes(op){

            var nomeVariacao = document.getElementById("campoVariacao");
            var textoClienteVariacao = document.getElementById("textoClienteVariacao");
            var opVariacao = document.getElementById("opVariacao");
            var botaoAddVariacao = document.getElementById("botaoAddVariacao");
            var botaoRemoveVariacao = document.getElementById("botaoRemoveVariacao");

            if(op == true){

                $("#fundoVariacoesCinza").slideDown("fast");

                botaoAddVariacao.classList.add("d-none");
                botaoRemoveVariacao.classList.remove("d-none");

            }else{

                nomeVariacao.value = "";
                textoClienteVariacao.value = "";
                $('#opVariacao').flexdatalist('disabled', false);
                $('#opVariacao').flexdatalist('value', '');
                $('#opVariacao').flexdatalist('disabled', true);
                textoClienteVariacao.setAttribute("disabled", "disabled");

                $("#fundoVariacoesCinza").slideUp("fast");

                botaoAddVariacao.classList.remove("d-none");
                botaoRemoveVariacao.classList.add("d-none");

            }

        }

        $('.flexdatalist').flexdatalist({
            minLength: 1,
        });
        
        $(document).ready(function () {
        $('input').keypress(function (e) {
                var code = null;
                code = (e.keyCode ? e.keyCode : e.which);                
                return (code == 13) ? false : true;
        });
        });

    </script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-3 d-none d-md-block" id="fundoMenuPrincipal">

                <div class="row mt-3">

                    <div class="col text-center">

                        <img src="img/logo.png" width="50%">

                    </div>

                </div>

                <div class="row mt-3 border-bottom border-secondary pb-4">

                    <div class="col text-center text-white">

                        <span>Bem vindo <b>Erick Mota</b></span><br>
                        <span>Você é um adm nível 1</span>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col text-white">

                        <nav>

                            <ul id="listaMenu">

                                <li>INICIO</li>
                                <li>NOVO PRODUTO</li>
                                <li>PRODUTOS CADASTRADOS</li>
                                <li>PEDIDOS</li>
                                <li>CONFIGURAÇÕES DO SITE</li>
                                <li>PAGSEGURO</li>

                            </ul>

                        </nav>

                    </div>

                </div>

            </div>

            <div class="col-12 col-md-9 offset-md-3">

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h1>Editar Produto - ID: <?php echo $idProduto; ?></h1>
                        <small class="text-danger">Nenhum dado será alterado, até você clicar no botão "ATUALIZAR"</small>

                    </div>

                </div>

                <div class="row">

                    <div class="col text-secondary">

                        <form enctype="multipart/form-data" action="php/editar_produto.php" method="POST">

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label">Nome do produto <span class="text-danger">*</span></label>
                                    <input id="campoNomeProduto" class="form-control" type="text" name="nome" maxlength="47" autocomplete="off" required value="<?php echo $arrProduto["nome"]; ?>">
                                    <div id="avisoNome" class="form-text text-danger"></div>
                                    <div class="form-text">Máximo de 47 caracteres</div>

                                    <input type="hidden" value="<?php echo $idProduto; ?>" name="id_produto">

                                </div>

                                <script>

                                    function verifica_nome_produto(nome_produto, nomeAtual) {
                                                        
                                        $.ajax({

                                            type: "POST",
                                            dataType: "html",

                                            url: "ajax/verifica_nome_produto_editar.php",

                                            /* beforeSend: function () {

                                                $("#areaInputVariacaoTexto").html("<img src='img/loading.gif' width='60px'>");

                                            }, */

                                            data: {nome_produto: nome_produto, nomeAtual: nomeAtual},

                                            success: function (msg) {

                                                $("#avisoNome").html(msg);

                                            }

                                        });

                                    }

                                    $("#campoNomeProduto").keyup(function(){

                                        var campoNomeProduto = document.getElementById("campoNomeProduto").value;
                                        var nomeAtual = "<?php echo $arrProduto['nome']; ?>";

                                        verifica_nome_produto(campoNomeProduto, nomeAtual);

                                    });

                                </script>

                            </div>

                            <div class="row mt-4">

                                <script>

                                    function mudar_img(event, tipo){

                                        if(tipo == "capa"){

                                            var formatoArquivo = document.getElementById("input-capa").value.split('.').pop();
                                            var campoArquivo = document.getElementById("input-capa");

                                            if(formatoArquivo != "jpg" && formatoArquivo != "jpeg"){

                                                campoArquivo.value = "";
                                                var output = document.getElementById('escolher-img-capa');
                                                output.src = "img/selecionar-capa.png";
                                                alert("Por favor, selecione uma imagem no formato JPG");

                                            }else{

                                                var output = document.getElementById('escolher-img-capa');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                URL.revokeObjectURL(output.src)
                                                }

                                                $("#label-img-1").removeClass("d-none");

                                            }
                                            
                                            $("#hidden-input-capa").val(0);
                                            $("#input-capa").attr("required", "required");

                                        }else{

                                            var formatoArquivo = document.getElementById("input-img-"+tipo).value.split('.').pop();
                                            var campoArquivo = document.getElementById("input-img-"+tipo);

                                            if(formatoArquivo != "jpg" && formatoArquivo != "jpeg"){

                                                var i = 9;

                                                while(i > tipo){

                                                    var formatoArquivoS = document.getElementById("input-img-"+i).value.split('.').pop();
                                                    var campoArquivoS = document.getElementById("input-img-"+i);

                                                    campoArquivoS.value = "";
                                                    var outputS = document.getElementById("escolher-img-"+i);
                                                    outputS.src = "img/selecionar-galeria.png";
                                                    $("#label-img-"+i).addClass("d-none");

                                                    i_less = i - 1;

                                                    $("#hidden-input-img-"+i_less).val(0);

                                                    i--;

                                                }

                                                $("#hidden-input-img-9").val(0);

                                                $("#hiddenQtdImg").val(tipo - 1);

                                                campoArquivo.value = "";
                                                var output = document.getElementById("escolher-img-"+tipo);
                                                output.src = "img/selecionar-galeria.png";
                                                alert("Por favor, selecione uma imagem no formato JPG");

                                            }else{

                                                var output = document.getElementById("escolher-img-"+tipo);
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                URL.revokeObjectURL(output.src)
                                                }

                                                var somaTipo = tipo + 1;

                                                if($("#hiddenQtdImg").val() < somaTipo){

                                                    $("#hiddenQtdImg").val(tipo);

                                                }else{

                                                    

                                                }

                                                $("#label-img-"+somaTipo).removeClass("d-none");

                                                $("#hidden-input-img-"+tipo).val(0);

                                            }

                                            /* var output = document.getElementById("escolher-img-"+tipo);
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                            URL.revokeObjectURL(output.src)
                                            }

                                            var somaTipo = tipo + 1;

                                            if($("#hiddenQtdImg").val() < somaTipo){

                                                $("#hiddenQtdImg").val(tipo);

                                            }else{

                                                

                                            }

                                            $("#label-img-"+somaTipo).removeClass("d-none"); */

                                        }

                                    }

                                    function remover_img(){

                                        var numeroImg = $("#hiddenQtdImg").val();

                                        var somaImg = parseInt(numeroImg) + 1;

                                        $("#input-img-"+numeroImg).val("");
                                        document.getElementById("escolher-img-"+numeroImg).src ="img/selecionar-galeria.png";
                                        $("#label-img-"+somaImg).addClass("d-none");

                                        $("#hiddenQtdImg").val(numeroImg - 1);
                                        $("#hidden-input-img-"+numeroImg).val(0);

                                    }

                                </script>

                                <div class="col">

                                    <label class="form-label" for="input-img1">Imagem da capa  <span class="text-danger">*</span> / Galeria</label>
                                    <div class="form-text text-info">*Essa prévia das imagens não correspondem ao modo como elas irão aparecer na galeria!</div><br>

                                    <label class="form-label" for="input-capa"><img src="img/produtos/<?php echo $arrProduto["foto"]; ?>" id="escolher-img-capa" width="150px"></label>
                                    <input id="input-capa" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, 'capa')" type="file" name="capa">
                                    <input type="hidden" id="hidden-input-capa" value="1" name="hidden-capa">
                                    <input type="hidden" id="hidden-caminho-input-capa" value="<?php echo $arrProduto["foto"]; ?>" name="hidden-caminho-capa">

                                    <?php

                                    $funcRetornarDados = $classeProdutos->retorna_dados_galeria();

                                    $qtdGaleriaAtual = $funcRetornarDados["qtd"];

                                    if($qtdGaleriaAtual > 0){

                                        foreach($funcRetornarDados["dados"] as $arrDados){

                                            $img[] = $arrDados["caminho"];
    
                                        }

                                    }
                                    
                                    $i = 1;

                                    while($i <= 9){

                                        if($i <= $qtdGaleriaAtual){

                                            ?>

                                            <label id="label-img-<?php echo $i; ?>" class="form-label" for="input-img-<?php echo $i; ?>"><img src="img/produtos/<?php echo $img[$i - 1]; ?>" id="escolher-img-<?php echo $i; ?>" width="150px"></label>
                                            <input id="input-img-<?php echo $i; ?>" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, <?php echo $i; ?>)" type="file" name="img-<?php echo $i; ?>">
                                            <input type="hidden" id="hidden-input-img-<?php echo $i; ?>" value="1" name="hidden-<?php echo $i; ?>">
                                            <input type="hidden" id="hidden-caminho-input-img-<?php echo $i; ?>" value="<?php echo $img[$i - 1]; ?>" name="hidden-caminho-<?php echo $i; ?>">

                                            <?php

                                        }else{

                                            if($i == $qtdGaleriaAtual + 1){

                                                ?>

                                                <label id="label-img-<?php echo $i; ?>" class="form-label" for="input-img-<?php echo $i; ?>"><img src="img/selecionar-galeria.png" id="escolher-img-<?php echo $i; ?>" width="150px"></label>
                                                <input id="input-img-<?php echo $i; ?>" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, <?php echo $i; ?>)" type="file" name="img-<?php echo $i; ?>">
                                                <input type="hidden" id="hidden-input-img-<?php echo $i; ?>" value="0" name="hidden-<?php echo $i; ?>">

                                                <?php

                                            }else{

                                                ?>

                                                <label id="label-img-<?php echo $i; ?>" class="form-label d-none" for="input-img-<?php echo $i; ?>"><img src="img/selecionar-galeria.png" id="escolher-img-<?php echo $i; ?>" width="150px"></label>
                                                <input id="input-img-<?php echo $i; ?>" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, <?php echo $i; ?>)" type="file" name="img-<?php echo $i; ?>">
                                                <input type="hidden" id="hidden-input-img-<?php echo $i; ?>" value="0" name="hidden-<?php echo $i; ?>">

                                                <?php

                                            }

                                        }
                                    
                                    $i++;

                                    }
                                    
                                    ?>

                                    <input type="hidden" id="hiddenQtdImg" name="qtd-galeria" value="<?php echo $qtdGaleriaAtual; ?>">

                                    <input type="hidden" name="qtd-galeria_atual" value="<?php echo $qtdGaleriaAtual; ?>">

                                    <img onclick="remover_img()" src="img/remover.png" width="25px" style="cursor: pointer;">

                                    <div class="form-text">A imagem da capa é obrigatória; adicione até 9 imagens (opcionais) para a galeria fora a capa</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Descrição do produto <span class="text-danger">*</span></label>

                                    <textarea class="form-control" rows="10" cols="80" name="descricao" required><?php echo $arrProduto["descricao"]; ?></textarea>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Preço <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="preco" step=".01" required value="<?php echo $arrProduto["preco"]; ?>">

                                    <div class="form-text">Preço para venda</div>

                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Preço antigo</label>

                                    <input class="form-control" type="number" step=".01" name="promocao" value="<?php echo $arrProduto["preco_promocao"]; ?>">

                                    <div class="form-text text-info">*Deixe em branco, se não quiser mostrar nenhuma promoção</div>
                                    <div class="form-text">Irá aparecer assim <span class="text-decoration-line-through">R$1000,00</span></div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Quantidade no estoque <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="qtd" required value="<?php echo $arrProduto["qtd_estoque"]; ?>">

                                    <div class="form-text">Dica: se estiver vendendo esse produto sob encomenda, defina uma quantidade alta</div>

                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Estado do produto <span class="text-danger">*</span></label>

                                    <select class="form-select" name="estado" required>

                                        <option disabled selected hidden>Difina o estado</option>
                                        <option value="publicado-disponivel" <?php
                                        
                                        if($arrProduto["estado"] == "publicado-disponivel"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Publicado - disponível</option>
                                        <option value="publicado-nao-disponivel" <?php
                                        
                                        if($arrProduto["estado"] == "publicado-nao-disponivel"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Publicado - Não disponível</option>
                                        <option value="rascunho" <?php
                                        
                                        if($arrProduto["estado"] == "rascunho"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Rascunho</option>
            
                                    </select>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Variação padrão <span class="text-danger">*</span></label>

                                    <select class="form-select" name="variacao" required>

                                        <option disabled selected hidden>Difina um padrão</option>
                                        <option value="nenhum" <?php
                                        
                                        if($arrProduto["variacao_padrao"] == "nenhum"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Nenhum padrão</option>
                                        <option value="unico" <?php
                                        
                                        if($arrProduto["variacao_padrao"] == "unico"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Anel único</option>
                                        <option value="casal" <?php
                                        
                                        if($arrProduto["variacao_padrao"] == "casal"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Anel casal</option>
                                        <option value="aro" <?php
                                        
                                        if($arrProduto["variacao_padrao"] == "aro"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Apenas aro</option>
                                        <option value="gravacao" <?php
                                        
                                        if($arrProduto["variacao_padrao"] == "gravacao"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Apenas gravação</option>
            
                                    </select>

                                    <div class="form-text"><b>Nenhum padrão:</b> não será solicitado nenhum padrão de escolha ao usuário<br>
                                    <b>Anel único:</b> Será solicitado número do aro e gravação, apenas para uma pessoa<br>
                                    <b>Anel casal:</b> Será solicitado número do aro e gravação, para duas pessoas<br>
                                    <b>Apenas aro:</b> Será solicitado apenas o número do aro (sem a gravação), apenas para uma pessoa<br>
                                    <b>Apenas gravação:</b> Será solicitado apenas a gravação, apenas para uma pessoa</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao" class="d-none" style="cursor: pointer;">Adicionar variação complementar</a>
                                    <a onclick="aparecerVariacoes(false)" class="" id="botaoRemoveVariacao" style="cursor: pointer;">Remover variação complementar</a>

                                </div>

                            </div>

                            <div class="row mt-4" id="fundoVariacoesCinza">

                                <div class="col-12 col-md-9 p-3 bg-light">

                                    <?php
                                    
                                    $funcRetornaVariacaoComplementar = $classeProdutos->retorna_variacao_complementar_pelo_id($arrProduto["id_variacao_produto"]);

                                    ?>

                                    <div class="row">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Nome da variação</label>

                                            <input style="text-transform:lowercase;" list="variacoesDisponiveis" autocomplete="off" id="campoVariacao" type="text" class="form-control" name="novaVariacao" value="<?php echo $funcRetornaVariacaoComplementar["nome"]; ?>">

                                            <div class="form-text">Selecione uma variacao já existente ou crie uma nova</div>

                                            <datalist id="variacoesDisponiveis">

                                                <?php
                                                
                                                foreach($classeProdutos->retorna_variacoes() as $arrVariacoes){
                                                
                                                ?>

                                                <option value="<?php echo $arrVariacoes["nome"]; ?>">

                                                <?php
                                                
                                                }
                                                
                                                ?>

                                            </datalist>

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Texto para o cliente</label>

                                            <div id="areaInputVariacaoTexto" class="text-center">

                                                <input autocomplete="off" id="textoClienteVariacao" type="text" class="form-control" name="texto-variacao" disabled value="<?php echo $funcRetornaVariacaoComplementar["texto_cliente"]; ?>">

                                            </div>

                                            <div class="form-text"><b>Exemplo:</b> Escolha a cor da pedra</div>

                                        </div>

                                    </div>

                                    <div class="row mt-4 mb-2">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Opções da variação</label>

                                            <!-- <input class="form-control" autocomplete="off" id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" name="opNovaVariacao"> -->

                                            <div id="areaInputVariacao" class="text-center">

                                                <input id="opVariacao" type='text' class='flexdatalist  form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao" disabled value="<?php echo $funcRetornaVariacaoComplementar["opcoes"]; ?>">

                                            </div>

                                            <div class="form-text text-warning">Digite o nome da opção e pressione <b>ENTER</b> para confirmar e pular para a próxima opção</div>

                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                                                                
                                        function retornar_op_variacoes(nome_variacao) {
                    
                                            $.ajax({
                    
                                                type: "POST",
                                                dataType: "html",
                    
                                                url: "ajax/retorna_op_variacao.php",
                    
                                                beforeSend: function () {
                    
                                                    $("#areaInputVariacao").html("<img src='img/loading.gif' width='60px'>");
                    
                                                },
                    
                                                data: {nome_variacao: nome_variacao},
                    
                                                success: function (msg) {
                    
                                                    $("#areaInputVariacao").html(msg);
                    
                                                }
                    
                                            });
                    
                                        }

                                        function retornar_texto_variacoes(nome_variacao) {
                    
                                            $.ajax({

                                                type: "POST",
                                                dataType: "html",

                                                url: "ajax/retorna_texto_variacao.php",

                                                beforeSend: function () {

                                                    $("#areaInputVariacaoTexto").html("<img src='img/loading.gif' width='60px'>");

                                                },

                                                data: {nome_variacao: nome_variacao},

                                                success: function (msg) {

                                                    $("#areaInputVariacaoTexto").html(msg);

                                                }

                                            });

                                        }

                                        $("#campoVariacao").keyup(function(){

                                            var campoVariacao = document.getElementById("campoVariacao").value;

                                            retornar_op_variacoes(campoVariacao);
                                            retornar_texto_variacoes(campoVariacao);

                                        });
                
                                    </script>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Categoria <span class="text-danger">*</span></label>

                                    <input type='text' autocomplete="off" class='flexdatalist form-control' data-min-length='0' multiple='multiple' list='categorias' name='categoria' required value="<?php
                                    
                                    $funcRetornaCategoria = $classeProdutos->retorna_categorias_pelo_id_do_produto();

                                    foreach($funcRetornaCategoria as $arrRetornaCategorias){

                                        echo $arrRetornaCategorias["nome"].",";

                                    }
                                    
                                    ?>">

                                    <div class="form-text text-warning">Selecione categorias existentes, ou crie uma nova e pressione <b>ENTER</b> para confirmar</div>
                                    <div class="form-text">Você pode selecionar mais de uma categoria; é necessário pelo menos 1 categoria</div>

                                    <datalist id="categorias">

                                        <?php
                                        
                                        foreach($classeProdutos->retorna_categorias() as $arrCategoria){
                                        
                                        ?>

                                        <option value="<?php echo $arrCategoria["nome"]; ?>"><?php echo $arrCategoria["nome"]; ?></option>

                                        <?php
                                        
                                        }
                                        
                                        ?>

                                    </datalist>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Qtd máxima de caracteres</label>

                                    <input class="form-control" type="number" name="maximo_caracteres" value="<?php echo $arrProduto["qtd_caracteres"] ?>">

                                    <div class="form-text text-info">*Deixe em branco para não limitar quantidade de caracteres ou se o produto não vai permitir gravação</div>
                                    <div class="form-text">Define a quantidade de caracteres que o cliente poderá digitar, quando escolhendo a gravação no produto</div>
                                    
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Tipo do produto <span class="text-danger">*</span></label>

                                    <select name="tipo" class="form-select" required>

                                        <option disabled selected hidden>Defina o tipo</option>
                                        <option value="ouro" <?php
                                        
                                        if($arrProduto["tipo"] == "ouro"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Ouro</option>
                                        <option value="prata" <?php
                                        
                                        if($arrProduto["tipo"] == "prata"){

                                            echo "selected";

                                        }
                                        
                                        ?>>Prata</option>

                                    </select>

                                    <div class="form-text">Defina se o produto é do tipo ouro ou prata</div>

                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="col-12 col-md-9">

                                    <h2>Correios / Frete <span class="text-danger">*</span></h2>

                                    <p class="text-info">Dados para calculo do frete. Preencher corretamente de acordo com as especificações dos campos!</p>
                                    
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Peso do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="peso" step=".01" required value="<?php echo $arrProduto["peso"]; ?>">

                                    <div class="form-text">Em Kg, onde 500g é equivalente a <b>0.5</b></div>
                                    
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Altura do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="1" name="altura" required value="<?php echo $arrProduto["altura"]; ?>">

                                    <div class="form-text">Em centímetros (cm), mínimo 1cm</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Largura do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="10" name="largura" required value="<?php echo $arrProduto["largura"]; ?>">

                                    <div class="form-text">Em centímetros (cm), mínimo 10cm</div>
                                    
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Comprimento do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="15" name="comprimento" required value="<?php echo $arrProduto["comprimento"]; ?>">

                                    <div class="form-text">Em centímetros (cm), mínimo 15cm</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Dias para entrega</label>

                                    <input class="form-control" type="number" name="dias-entrega" value="<?php echo $arrProduto["dias_entrega"]; ?>">

                                    <div class="form-text text-info">*Deixe em branco para desconsiderar.</div>
                                    <div class="form-text">Esse valor será somado a quantidade de dias que o correios levará para entregar o produto,
                                    por exemplo, se os correios levará 5 dias, e você definir esse valor como 20, o cliente será informado que a encomenda
                                    levará 25 dias para entrega.
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <button id="botaoEnviar" type="submit" class="btn btn-success float-end">ATUALIZAR</button>
                                    
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                    <!-- <form enctype="multipart/form-data" action="php/adm.php" method="POST">

                        Nome: <input type="text" name="nome" maxlength="47"><br>

                        Imagem capa: <input type="file" name="capa"><br>

                        Imagem galeria 1: <input type="file" name="galeria1"><br>

                        Imagem galeria 2: <input type="file" name="galeria2"><br>

                        Imagem galeria 3: <input type="file" name="galeria3"><br>

                        Descrição: <textarea rows="3" cols="80" name="descricao"></textarea><br>

                        Preço <input type="number" name="preco" step=".01"><br>

                        Quantidade estoque: <input type="number" name="qtd"><br>

                        estado da publicação: <select name="estado">

                            <option value="publicado-disponivel">Publicado - disponível</option>
                            <option value="publicado-nao-disponivel">Publicado - Não disponível</option>
                            <option value="rascunho">Rascunho</option>

                        </select><br>

                        Variação Padrão: <select name="variacao" onchange="aparecerVariacoes(this.value)">

                            <option value="nenhum">Nenhum padrão</option>
                            <option value="unico">Anel único</option>
                            <option value="casal">Anel casal</option>
                            <option value="aro">Apenas Aro</option>
                            <option value="gravacao">Apenas Gravação</option>

                        </select><br>

                        <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao">Variação complementar</a>
                        <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao">Remover variação complementar</a>

                        <br>Nome da variação: <input id="campoVariacao" type="text" class="d-none" name="novaVariacao"><br>

                        Opções das variações: <input id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" class="d-none" name="opNovaVariacao"><br>

                        <input type='text'
                            placeholder='Categoria'
                            class='flexdatalist'
                            data-min-length='1'
                            multiple='multiple'
                            list='languages'
                            name='categoria'>

                        <datalist id="languages">
                            <option value="PHP">PHP</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="Cobol">Cobol</option>
                            <option value="C#">C#</option>
                            <option value="C++">C++</option>
                            <option value="Java">Java</option>
                            <option value="Pascal">Pascal</option>
                            <option value="FORTRAN">FORTRAN</option>
                            <option value="Lisp">Lisp</option>
                            <option value="Swift">Swift</option>
                        </datalist><br>

                        Máximo de caracteres: <input type="number" name="maximo_caracteres"><br>

                        Promoção: <input type="number" step=".01" name="promocao"><br>

                        Tipo: <select name="tipo">

                            <option value="nenhum">Nenhum</option>
                            <option value="ouro">Ouro</option>
                            <option value="prata">Prata</option>

                        </select><br>

                        <input type="submit">

                    </form> -->

            </div>

        </div>

    </div>

</body>

<?php
    
}

?>

</html>