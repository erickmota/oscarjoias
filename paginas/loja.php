<!DOCTYPE html>
<html>

<head>

    <?php
    
    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();
    
    ?>

    <title>Loja - Oscar Jóias</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="index">

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="Oscar Jóias">
    <meta itemprop="description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
    <meta itemprop="image" content="img/apresentacao.jpg">

    <!-- Open Graph Facebook -->
    <meta property="og:title" content="Oscar Jóias">
    <meta property="og:description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias."/>
    <meta property="og:site_name" content="Oscar Jóias"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/apresentacao.jpg">

    <!-- Twitter -->
    <meta name="twitter:title" content="Oscar Jóias">
    <meta name="twitter:description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="img/apresentacao.jpg">

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

    <link rel="stylesheet" href="css/loja.css">

    <script>

        function mudarItemAdd(item){

            var nomeItem = document.getElementById("nomeItem"+item);
            var precoItem = document.getElementById("precoItem"+item);
            var precoItemGrande = document.getElementById("precoItemGrande"+item);
            var botaoComprar = document.getElementById("botaoComprar"+item);
            var precoAntigo = document.getElementById("precoAntigo"+item);

            nomeItem.classList.add("d-none");
            precoItem.classList.add("d-none");
            precoItemGrande.classList.remove("d-none");
            botaoComprar.classList.remove("d-none");
            precoAntigo.style.display="none";

        }

        function mudarItemRemove(item){

            var nomeItem = document.getElementById("nomeItem"+item);
            var precoItem = document.getElementById("precoItem"+item);
            var precoItemGrande = document.getElementById("precoItemGrande"+item);
            var botaoComprar = document.getElementById("botaoComprar"+item);
            var precoAntigo = document.getElementById("precoAntigo"+item);

            nomeItem.classList.remove("d-none");
            precoItem.classList.remove("d-none");
            precoItemGrande.classList.add("d-none");
            botaoComprar.classList.add("d-none");
            precoAntigo.style.display="block";

        }

        function mostrarMenuFiltro(){

            var espacoMenuFiltro = document.getElementById("espacoMenuFiltro");
            var fundoTransparente = document.getElementById("fundoTransparente");

            espacoMenuFiltro.classList.remove("d-none");
            fundoTransparente.classList.remove("d-none");

        }

        function esconderMenuFiltro(){

            var espacoMenuFiltro = document.getElementById("espacoMenuFiltro");
            var fundoTransparente = document.getElementById("fundoTransparente");

            espacoMenuFiltro.classList.add("d-none");
            fundoTransparente.classList.add("d-none");

        }

        function mudar_ordenacao(op){

            <?php
                
            $paginaAtual = $_SERVER["REQUEST_URI"];
                
            ?>

            if(op == "nome"){

                <?php
                
                if(isset($_GET["tipo"]) || isset($_GET["vma"]) || isset($_GET["cat"]) || isset($_GET["busca"])){

                    $novaOrdenacao = str_replace(htmlentities($_GET["ordenacao"]), "nome", $_SERVER["REQUEST_URI"]);
                    $novaOrdem = str_replace(htmlentities($_GET["tipoord"]), "cre", $novaOrdenacao);
                    $novaPg = str_replace(htmlentities($_GET["pg"]), 1, $novaOrdem);

                ?>

                    window.location="<?php echo $novaPg; ?>";

                <?php
    
                }else{

                ?>

                    window.location="loja?pg=1&ordenacao=nome&tipoord=cre";

                <?php

                }
                    
                ?>

            }else if(op == "ua"){

                <?php
                
                if(isset($_GET["tipo"]) || isset($_GET["vma"]) || isset($_GET["cat"]) || isset($_GET["busca"])){

                    $novaOrdenacao = str_replace(htmlentities($_GET["ordenacao"]), "adicionado", $_SERVER["REQUEST_URI"]);
                    $novaOrdem = str_replace(htmlentities($_GET["tipoord"]), "dec", $novaOrdenacao);
                    $novaPg = str_replace(htmlentities($_GET["pg"]), 1, $novaOrdem);

                ?>

                    window.location="<?php echo $novaPg; ?>";

                <?php
    
                }else{

                ?>

                    window.location="loja?pg=1&ordenacao=adicionado&tipoord=dec";

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&ordenacao=adicionado&tipoord=dec"; */

            }else if(op == "pa"){

                <?php
                
                if(isset($_GET["tipo"]) || isset($_GET["vma"]) || isset($_GET["cat"]) || isset($_GET["busca"])){

                    $novaOrdenacao = str_replace(htmlentities($_GET["ordenacao"]), "adicionado", $_SERVER["REQUEST_URI"]);
                    $novaOrdem = str_replace(htmlentities($_GET["tipoord"]), "cre", $novaOrdenacao);
                    $novaPg = str_replace(htmlentities($_GET["pg"]), 1, $novaOrdem);

                ?>

                    window.location="<?php echo $novaPg; ?>";

                <?php
    
                }else{

                ?>

                    window.location="loja?pg=1&ordenacao=adicionado&tipoord=cre";

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&ordenacao=adicionado&tipoord=cre"; */

            }else if(op == "mep"){

                <?php
                
                if(isset($_GET["tipo"]) || isset($_GET["vma"]) || isset($_GET["cat"]) || isset($_GET["busca"])){

                    $novaOrdenacao = str_replace(htmlentities($_GET["ordenacao"]), "preco", $_SERVER["REQUEST_URI"]);
                    $novaOrdem = str_replace(htmlentities($_GET["tipoord"]), "cre", $novaOrdenacao);
                    $novaPg = str_replace(htmlentities($_GET["pg"]), 1, $novaOrdem);

                ?>

                    window.location="<?php echo $novaPg; ?>";

                <?php
    
                }else{

                ?>

                    window.location="loja?pg=1&ordenacao=preco&tipoord=cre";

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&ordenacao=preco&tipoord=cre"; */

            }else if(op == "map"){

                <?php
                
                if(isset($_GET["tipo"]) || isset($_GET["vma"]) || isset($_GET["cat"]) || isset($_GET["busca"])){

                    $novaOrdenacao = str_replace(htmlentities($_GET["ordenacao"]), "preco", $_SERVER["REQUEST_URI"]);
                    $novaOrdem = str_replace(htmlentities($_GET["tipoord"]), "dec", $novaOrdenacao);
                    $novaPg = str_replace(htmlentities($_GET["pg"]), 1, $novaOrdem);

                ?>

                    window.location="<?php echo $novaPg; ?>";

                <?php
    
                }else{

                ?>

                    window.location="loja?pg=1&ordenacao=preco&tipoord=dec";

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&ordenacao=preco&tipoord=dec"; */

            }

        }

        function filtrar(){

            var selectTipo = document.getElementById("selectTipo").value;
            var valorMinimo = document.getElementById("campoValorMinimo").value;
            var valorMaximo = document.getElementById("campoValorMaximo").value;

            if(valorMinimo != "" && valorMaximo == ""){

                valorMaximo = 10000;

            }else if(valorMinimo == "" && valorMaximo != ""){

                valorMinimo = 1;

            }

            <?php
            
            if(isset($_GET["ordenacao"]) && isset($_GET["tipoord"])){

            ?>

            var ordenacao = "<?php echo htmlentities($_GET["ordenacao"]); ?>";
            var tipoOrdenacao = "<?php echo htmlentities($_GET["tipoord"]); ?>";

            <?php

            }else{

            ?>
            
            var ordenacao = "adicionado";
            var tipoOrdenacao = "dec";

            <?php

            }
            
            ?>

            <?php
            

            
            ?>

            if(selectTipo == "nenhum" && valorMinimo == "" && valorMaximo == ""){

                

            }else if(selectTipo != "nenhum" && valorMinimo == "" && valorMaximo == ""){

                <?php
                
                if(isset($_GET["cat"])){

                    $cat = htmlentities($_GET["cat"]);

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&cat=<?php echo $cat; ?>";

                <?php
    
                }else if(isset($_GET["busca"])){

                    $busca = htmlentities($_GET["busca"]);

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&busca=<?php echo $busca; ?>";

                <?php

                }else{

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao;

                <?php

                }
                    
                ?>

               /*  window.location="loja?pg=1&tipo="+selectTipo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao; */

            }else if(selectTipo == "nenhum" && valorMinimo != "" && valorMaximo != ""){

                <?php
                
                if(isset($_GET["cat"])){

                    $cat = htmlentities($_GET["cat"]);

                ?>

                    window.location="loja?pg=1&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&cat=<?php echo $cat; ?>";

                <?php
    
                }else if(isset($_GET["busca"])){

                    $busca = htmlentities($_GET["busca"]);

                ?>

                    window.location="loja?pg=1&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&busca=<?php echo $busca; ?>";

                <?php

                }else{

                ?>

                    window.location="loja?pg=1&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao;

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao; */

            }else if(selectTipo != "nenhum" && valorMinimo != "" && valorMaximo != ""){

                <?php
                
                if(isset($_GET["cat"])){

                    $cat = htmlentities($_GET["cat"]);

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&cat=<?php echo $cat; ?>";

                <?php
    
                }else if(isset($_GET["busca"])){

                    $busca = htmlentities($_GET["busca"]);

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao+"&busca=<?php echo $busca; ?>";

                <?php

                }else{

                ?>

                    window.location="loja?pg=1&tipo="+selectTipo+"&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao;

                <?php

                }
                    
                ?>

                /* window.location="loja?pg=1&tipo="+selectTipo+"&vmi="+valorMinimo+"&vma="+valorMaximo+"&ordenacao="+ordenacao+"&tipoord="+tipoOrdenacao; */

            }

        }

        function definir_texto_qtd(){

            var espacoTextoQtd = document.getElementById("espacoTextoQtd");
            var hiddenQtdItemPagina = document.getElementById("hiddenQtdItemPagina").value;
            var hiddenQtdItemTotal = document.getElementById("hiddenQtdItemTotal").value;

            espacoTextoQtd.innerHTML = "Mostrando "+hiddenQtdItemPagina+" de "+hiddenQtdItemTotal+" itens";

        }

    </script>

</head>

<body onload="definir_texto_qtd()">

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <!-- Cabecalho Filtro -->
        <div class="row justify-content-center">

            <div class="col-12 col-md-9 pt-3">

                <div class="row">

                    <div id="espacoTextoQtd" class="col-6 text-secondary">
        
                    </div>
        
                    <div class="col-3 text-end">

                        <img onclick="mostrarMenuFiltro()" id="imgFiltro" src="img/filtro.png">

                    </div>
        
                    <div class="col-3">
    
                        <select id="campoSelect" class="text-secondary campoSelect" onchange="mudar_ordenacao(this.value)">
    
                            <option disabled selected hidden>Organizar por</option>
                            <option value="nome">Nome</option>
                            <option value="ua">Último adicionado</option>
                            <option value="pa">Primeiro Adicionado</option>
                            <option value="mep">Menor Preço</option>
                            <option value="map">Maior Preço</option>
    
                        </select>
    
                    </div>

                </div>

                <!-- Menu Filtro -->
                <div id="espacoMenuFiltro" class="row justify-content-center d-none">

                    <div class="col-12 col-md-9 mt-2" id="espacoFiltro">

                        <div class="row row justify-content-center pb-3">

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <select id="selectTipo" class="text-secondary campoSelect">
    
                                    <option value="nenhum" selected>Tipo - Nenhum</option>
                                    <option value="ouro">Ouro</option>
                                    <option value="prata">Prata</option>
            
                                </select>

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <input id="campoValorMinimo" class="campoSelect" type="number" placeholder="Valor Mínimo">

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <input id="campoValorMaximo" class="campoSelect" type="number" placeholder="Valor Máximo">

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <button id="botaoFiltrar" onclick="filtrar()">FILTRAR</button>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- //Menu Filtro -->

                <div onclick="esconderMenuFiltro()" id="fundoTransparente" class="d-none"></div>

            </div>

        </div>
        <!-- //Cabecalho Filtro -->

        <!-- Itens filtro -->
        <div class="row justify-content-center <?php if(!isset($_GET["tipo"]) && !isset($_GET["vmi"]) && !isset($_GET["vma"])){ echo "d-none"; } ?>">

            <div class="col-md-9 mt-3 pt-3">

                <small id="itemFiltro" class="<?php if(!isset($_GET["tipo"])){ echo "d-none"; } ?>"><?php echo htmlentities($_GET["tipo"]) ?></small>

                <small id="itemFiltro" class="<?php if(!isset($_GET["vmi"])){ echo "d-none"; } ?>">-R$<?php echo number_format(htmlentities($_GET["vmi"]), 2, ",", ".") ?></small>

                <small id="itemFiltro" class="<?php if(!isset($_GET["vma"])){ echo "d-none"; } ?>">+R$<?php echo number_format(htmlentities($_GET["vma"]), 2, ",", ".") ?></small>
                
                <small class="ms-3"><a href="loja?pg=1" class="text-secondary">limpar filtro</a></small>

            </div>

        </div>
        <!-- //Itens filtro -->

        <!-- Espaço dos itens -->
        <div class="row justify-content-center">

            <div class="col-md-9 text-center">

                <div class="row">

                    <div class="col-12">

                        <div class="row">

                            <?php

                            if(isset($_GET["ordenacao"])){

                                $ordenacao = htmlentities($_GET["ordenacao"]);
                                $tipoOrdenacao = htmlentities($_GET["tipoord"]);

                                /* Ordenação */
                                if($ordenacao == "nome"){

                                    $ordenacao2 = "nome";

                                }else if($ordenacao == "adicionado"){

                                    $ordenacao2 = "id";

                                }else if($ordenacao == "preco"){

                                    $ordenacao2 = "preco";

                                };

                                /* Tipo ordenação */
                                if($tipoOrdenacao == "cre"){

                                    $tipoOrdenacao2 = "ASC";

                                }else{

                                    $tipoOrdenacao2 = "DESC";

                                }

                                /* Tipo */
                                if(isset($_GET["tipo"])){

                                    $tipo = htmlentities($_GET["tipo"]);

                                    if($tipo == "ouro"){

                                        $tipo2 = "ouro";

                                    }else{

                                        $tipo2 = "prata";

                                    }

                                }else{

                                    $tipo2 = "SE";

                                }

                                if(isset($_GET["vmi"])){

                                    /* $vMinimo = $_GET["vmi"];
                                    $vMaximo = $_GET["vma"]; */
                                    $vMinimo = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["vmi"]));
                                    $vMaximo = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["vma"]));

                                }else{

                                    $vMinimo = "SE";
                                    $vMaximo = "SE";

                                }

                                if(isset($_GET["cat"])){

                                    /* $categoria = $_GET["cat"]; */

                                    $catComTraco = str_replace(" ", "-", htmlentities($_GET["cat"]));
                                    $transformarEmMinuscula = mb_strtolower($catComTraco, "UTF-8");
                                    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

                                    $categoria = $str6;

                                }else{

                                    $categoria = "SE";

                                }

                                if(isset($_GET["busca"])){

                                    $transformarEmMinuscula = mb_strtolower($_GET["busca"], "UTF-8");
                                    $trataInjection = str_replace(array("<", ">",";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

                                    $busca = $str6;

                                }else{

                                    $busca = "SE";

                                }

                            }else{

                                $ordenacao2 = "id";
                                $tipoOrdenacao2 = "ASC";
                                $tipo2 = "SE";
                                $vMinimo = "SE";
                                $vMaximo = "SE";
                                $categoria = "SE";
                                $busca = "SE";

                            }

                            $numeroPagina = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["pg"]));

                            if($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[0] == false){

                            ?>

                                <div class="col text-center mt-5 text-secondary" id="nenhumProduto">
                                
                                    NENHUM PRODUTO ENCONTRADO
                                
                                </div>

                            <?php

                            }else{

                            /* $tipo, $vMinimo, $vMaximo, $categoria, $pg, $ordenacao, $tipoOrdenacao */
                            foreach($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[0] as $arrProdutos){

                                $idProduto = $arrProdutos["id"];

                                /* $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
                                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                                $tirarCaracteres = str_replace("ã", "a", $transformarEmMinuscula);
                                $convert = iconv('utf-8', 'us-ascii//TRANSLIT', $tirarCaracteres); */

                                $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
                                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                            
                            ?>

                            <div class="col-12 col-sm-6 col-lg-4">

                                <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box" onmouseover="mudarItemAdd(<?php echo $idProduto; ?>)" onmouseout="mudarItemRemove(<?php echo $idProduto; ?>)">

                                    <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="fotoAnel">
                
                                    <p id="nomeItem<?php echo $idProduto; ?>" class="card-text mt-1 pt-2 border-top"><?php echo $arrProdutos["nome"]; ?></p>
                
                                    <span id="precoAntigo<?php echo $idProduto; ?>" class="text-decoration-line-through text-secondary <?php if($arrProdutos["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo $arrProdutos["preco_promocao"]; ?></span>
                                    <h5 id="precoItem<?php echo $idProduto; ?>" class="card-title">R$<?php echo number_format($arrProdutos["preco"], 2, ",", "."); ?></h5>

                                    <p id="precoItemGrande<?php echo $idProduto; ?>" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$<?php echo number_format($arrProdutos["preco"], 2, ",", "."); ?></p>

                                    <button class="botaoComprar d-none" id="botaoComprar<?php echo $idProduto; ?>">COMPRAR</button>
                
                                </div>

                            </div>

                            <?php
                            
                            }

                            }
                            
                            ?>

                            <input type="hidden" id="hiddenQtdItemPagina" value="<?php echo $classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[1]; ?>">
                            <input type="hidden" id="hiddenQtdItemTotal" value="<?php echo $classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2]; ?>">

                        </div>
                        
                    </div>

                </div>

            </div>

        </div>
        <!-- //Espaço dos itens -->

        <div class="row justify-content-center mt-5">

        <?php

        $pgAnterior = "pg=".$classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[0];
        $pgProximo = "pg=".$classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[1];
        $pgAtual = "pg=".htmlentities($_GET["pg"]);
        
        ?>

            <div class="col-md-9 text-center">

                <a href="<?php echo str_replace($pgAtual, $pgAnterior, $_SERVER["REQUEST_URI"]); ?>"><div id="numeroPaginacao" class="<?php if($classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[0] == "SE"){ echo "d-none"; } ?>"><span><</span></div></a>

                <a href="<?php echo str_replace($pgAtual, $pgAnterior, $_SERVER["REQUEST_URI"]); ?>"><div id="numeroPaginacao" class="<?php if($classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[0] == "SE"){ echo "d-none"; } ?>"><span><?php echo htmlentities($_GET["pg"]) - 1; ?></span></div></a>

                <div id="numeroPaginacao" class="ativo"><span><?php echo htmlentities($_GET["pg"]); ?></span></div>
                
                <a href="<?php echo str_replace($pgAtual, $pgProximo, $_SERVER["REQUEST_URI"]); ?>"><div id="numeroPaginacao" class="<?php if($classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[1] == "SE"){ echo "d-none"; } ?>"><span><?php echo htmlentities($_GET["pg"]) + 1; ?></span></div></a>

                <a href="<?php echo str_replace($pgAtual, $pgProximo, $_SERVER["REQUEST_URI"]); ?>"><div id="numeroPaginacao" class="<?php if($classeProdutos->organizar_paginacao($classeProdutos->retorna_lsita_produtos($tipo2, $vMinimo, $vMaximo, $categoria, $numeroPagina, $ordenacao2, $tipoOrdenacao2, $busca)[2], htmlentities($_GET["pg"]))[1] == "SE"){ echo "d-none"; } ?>"><span>></span></div></a>

            </div>

        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>