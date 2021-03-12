<html>

<head>

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

    <link rel="stylesheet" href="css/adm_novo_produto.css">

    <script>
        
        function aparecerVariacoes(op){

            var nomeVariacao = document.getElementById("campoVariacao");
            var opVariacao = document.getElementById("opVariacao");
            var botaoAddVariacao = document.getElementById("botaoAddVariacao");
            var botaoRemoveVariacao = document.getElementById("botaoRemoveVariacao");

            if(op == true){

                nomeVariacao.classList.remove("d-none");
                opVariacao.classList.remove("d-none");
                botaoAddVariacao.classList.add("d-none");
                botaoRemoveVariacao.classList.remove("d-none");

            }else{

                nomeVariacao.classList.add("d-none");
                opVariacao.classList.add("d-none");
                botaoAddVariacao.classList.remove("d-none");
                botaoRemoveVariacao.classList.add("d-none");

            }

        }

        $('.flexdatalist').flexdatalist({
            minLength: 1
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

            <div class="col-3" id="fundoMenuPrincipal">

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

            <div class="col-9 offset-md-3">

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h1>Novo Produto</h1>

                    </div>

                </div>

                <div class="row">

                    <div class="col text-secondary">

                        <form>

                            <div class="row mt-4">

                                <div class="col-9">

                                    <label class="form-label">Nome do produto</label>
                                    <input class="form-control" type="text" name="nome" maxlength="47">
                                    <div class="form-text">Máximo de 47 caracteres</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <script>

                                    function mudar_img(event, tipo){

                                        if(tipo == "capa"){

                                            var output = document.getElementById('escolher-img-capa');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                            URL.revokeObjectURL(output.src)
                                            }

                                            $("#label-img-1").removeClass("d-none");

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

                                        }

                                    }

                                    function remover_img(){

                                        var numeroImg = $("#hiddenQtdImg").val();

                                        var somaImg = parseInt(numeroImg) + 1;

                                        $("#input-img-"+numeroImg).val("");
                                        document.getElementById("escolher-img-"+numeroImg).src ="img/selecionar-galeria.png";
                                        $("#label-img-"+somaImg).addClass("d-none");

                                        $("#hiddenQtdImg").val(numeroImg - 1);

                                    }

                                </script>

                                <div class="col">

                                    <label class="form-label" for="input-img1">Imagem da capa</label>
                                    <div class="form-text text-info">*Essa prévia das imagens não correspondem ao modo como elas irão aparecer na galeria!</div><br>

                                    <label class="form-label" for="input-capa"><img src="img/selecionar-capa.png" id="escolher-img-capa" width="150px"></label>
                                    <input id="input-capa" class="form-control d-none" accept="image/*" onchange="mudar_img(event, 'capa')" type="file" name="capa">

                                    <?php
                                    
                                    $i = 1;

                                    while($i <= 9){
                                    
                                    ?>

                                    <label id="label-img-<?php echo $i; ?>" class="form-label d-none" for="input-img-<?php echo $i; ?>"><img src="img/selecionar-galeria.png" id="escolher-img-<?php echo $i; ?>" width="150px"></label>
                                    <input id="input-img-<?php echo $i; ?>" class="form-control d-none" accept="image/*" onchange="mudar_img(event, <?php echo $i; ?>)" type="file" name="img-<?php echo $i; ?>">

                                    <?php
                                    
                                    $i++;

                                    }
                                    
                                    ?>

                                    <input type="hidden" id="hiddenQtdImg">

                                    <img onclick="remover_img()" src="img/remover.png" width="25px" style="cursor: pointer;">

                                    <div class="form-text">A imagem da capa é obrigatória; adicione até 9 imagens (opcionais) para a galeria fora a capa</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-9">

                                    <label class="form-label" for="input-img1">Descrição do produto</label>

                                    <textarea class="form-control" rows="5" cols="80" name="descricao"></textarea>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-5">

                                    <label class="form-label" for="input-img1">Preço</label>

                                    <input class="form-control" type="number" name="preco" step=".01">

                                    <div class="form-text">Preço para venda</div>

                                </div>

                                <div class="col-4">

                                    <label class="form-label" for="input-img1">Preço antigo</label>

                                    <input class="form-control" type="number" step=".01" name="promocao">

                                    <div class="form-text">Irá aparecer assim <span class="text-decoration-line-through">R$1000,00</span></div>
                                    <div class="form-text text-info">Deixe em branco, se não quiser mostrar nenhuma promoção</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-5">

                                    <label class="form-label" for="input-img1">Quantidade no estoque</label>

                                    <input class="form-control" type="number" name="qtd">

                                    <div class="form-text">Dica: se estiver vendendo esse produto sob encomenda, defina uma quantidade alta</div>

                                </div>

                                <div class="col-4">

                                    <label class="form-label" for="input-img1">Estado do produto</label>

                                    <select class="form-select" name="estado">

                                        <option disabled selected hidden>Difina o estado</option>
                                        <option value="publicado-disponivel">Publicado - disponível</option>
                                        <option value="publicado-nao-disponivel">Publicado - Não disponível</option>
                                        <option value="rascunho">Rascunho</option>
            
                                    </select>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-9">

                                    <label class="form-label" for="input-img1">Variação padrão</label>

                                    <select class="form-select" name="variacao">

                                        <option value="nenhum">Nenhum padrão</option>
                                        <option value="unico">Anel único</option>
                                        <option value="casal">Anel casal</option>
                                        <option value="aro">Apenas aro</option>
                                        <option value="gravacao">Apenas gravação</option>
            
                                    </select>

                                    <div class="form-text"><b>Nenhum padrão:</b> não será solicitado nenhum padrão de escolha ao usuário<br>
                                    <b>Anel único:</b> Será solicitado número do aro e gravação, apenas para uma pessoa<br>
                                    <b>Anel casal:</b> Será solicitado número do aro e gravação, para duas pessoas<br>
                                    <b>Apenas aro:</b> Será solicitado apenas o número do aro (sem a gravação), apenas para uma pessoa<br>
                                    <b>Apenas gravação:</b> Será solicitado apenas a gravação, apenas para uma pessoa</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-9">

                                    <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao" class="">Adicionar variação complementar</a>
                                    <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao">Remover variação complementar</a>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-9">

                                    <label class="form-label" for="input-img1">Nome da variação</label>

                                    <input list="variacoesDisponiveis" autocomplete="off" id="campoVariacao" type="text" class="form-control" name="novaVariacao">

                                    <datalist id="variacoesDisponiveis">
                                        <option value="Edge">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera">
                                        <option value="Safari">
                                    </datalist>

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

</html>