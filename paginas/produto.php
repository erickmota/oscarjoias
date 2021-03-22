<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();

    $classeProdutos->nome = $explode[1];
    
    ?>

    <title><?php
    
    foreach($classeProdutos->retorna_dados_pelo_nome() as $arrProduto){

        echo $arrProduto["nome"]." - Oscar Jóias";
    
    ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="<?php echo $arrProduto["descricao"]; ?>">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="index">

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="<?php echo $arrProduto["nome"]." - Oscar Jóias"; ?>">
    <meta itemprop="description" content="<?php echo $arrProduto["descricao"]; ?>">
    <meta itemprop="image" content="img/produtos/<?php echo $arrProduto["foto"]; ?>">

    <!-- Open Graph Facebook -->
    <meta property="og:title" content="<?php echo $arrProduto["nome"]." - Oscar Jóias"; ?>">
    <meta property="og:description" content="<?php echo $arrProduto["descricao"]; ?>"/>
    <meta property="og:site_name" content="Oscar Jóias"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/produtos/<?php echo $arrProduto["foto"]; ?>">

    <!-- Twitter -->
    <meta name="twitter:title" content="<?php echo $arrProduto["nome"]." - Oscar Jóias"; ?>">
    <meta name="twitter:description" content="<?php echo $arrProduto["descricao"]; ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="img/produtos/<?php echo $arrProduto["foto"]; ?>">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../lightslider/src/js/lightslider.js"></script>
    

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/produto.css">
    <script src="jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>

        /* Mask */
        $(document).ready(function(){

            $('.maskCep').mask('00000-000');

        });

        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:7,
                slideMargin:0,
                enableDrag: true,
                adaptiveHeight:true,
                currentPagerPosition:'left',
                controls: false,
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }   
            });  
        });

        $(document).ready(function() {
            var slider = $('#aroFeminino').lightSlider({
                slideMove:1,
                controls: false,
                pager: false,
                autoWidth:true,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 200,
                auto: false,
                loop: false,
                slideEndAnimation: true,
                pause: 4000,
            });
            $('#botaoAntesFeminino').click(function(){
                slider.goToPrevSlide(); 
            });
            $('#botaoDepoisFeminino').click(function(){
                slider.goToNextSlide(); 
            });  
        });

        $(document).ready(function() {
            var slider = $('#aroMasculino').lightSlider({
                slideMove:1,
                controls: false,
                pager: false,
                autoWidth:true,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 200,
                auto: false,
                loop: false,
                slideEndAnimation: true,
                pause: 4000,
            });
            $('#botaoAntesMasculino').click(function(){
                slider.goToPrevSlide(); 
            });
            $('#botaoDepoisMasculino').click(function(){
                slider.goToNextSlide(); 
            });  
        });

        $(document).ready(function() {
            var slider = $('#aroApenasAro').lightSlider({
                slideMove:1,
                controls: false,
                pager: false,
                autoWidth:true,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 200,
                auto: false,
                loop: false,
                slideEndAnimation: true,
                pause: 4000,
            });
            $('#botaoAntesApenasAro').click(function(){
                slider.goToPrevSlide(); 
            });
            $('#botaoDepoisApenasAro').click(function(){
                slider.goToNextSlide(); 
            });  
        });

        $(document).ready(function() {
            $('#espacoItem').lightSlider({
                item:5,
                slideMove:1,
                pager: false,
                controls:false,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 700, //ms'
                auto: true,
                loop: false,
                slideEndAnimation: true,
                pause: 4000,
                responsive : [
                    {
                        breakpoint:980,
                        settings: {
                            item:4,
                            slideMove:1,
                        }
                    },

                    {
                        breakpoint:900,
                        settings: {
                            item:3,
                            slideMove:1,
                        }
                    },

                    {
                        breakpoint:550,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    },

                    {
                        breakpoint:400,
                        settings: {
                            item:1,
                            slideMove:1
                        }
                    }
                ]
            });  
        });

        /* Tratar envio ao carrinho de compras */

        function mudarResultadoApenasAro(numero){

            var fundoNumero = document.getElementById("fundoNumeroApenasAro-"+numero);
            var hiddenApenasAro = document.getElementById("hiddenApenasAro");

            hiddenApenasAro.value = numero;
            fundoNumero.classList.add("ativado");

            var i = 9;

            while(i <= 34){

                if(i == numero){



                }else{

                    document.getElementById("fundoNumeroApenasAro-"+i).classList.remove("ativado");

                }

                i++;

            }

        }

        function mudarResultadoAroFeminino(numero){

            var fundoNumero = document.getElementById("fundoNumeroFeminino-"+numero);
            var hiddenFeminino = document.getElementById("hiddenFeminino");

            hiddenFeminino.value = numero;
            fundoNumero.classList.add("ativado");

            var i = 9;

            while(i <= 34){

                if(i == numero){



                }else{

                    document.getElementById("fundoNumeroFeminino-"+i).classList.remove("ativado");

                }

                i++;

            }

        }

        function mudarResultadoAroMasculino(numero){

            var fundoNumero = document.getElementById("fundoNumeroMasculino-"+numero);
            var hiddenMasculino = document.getElementById("hiddenMasculino");

            hiddenMasculino.value = numero;
            fundoNumero.classList.add("ativado");

            var i = 9;

            while(i <= 34){

                if(i == numero){



                }else{

                    document.getElementById("fundoNumeroMasculino-"+i).classList.remove("ativado");

                }

                i++;

            }

        }

        function mudarResultadoVariacaoAdicional(op){

            var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional");

            hiddenVariacaoAdicional.value = op;

        }

        function cadastrarProdutoCarrinho(variacao_padrao, variacao_complementar){

            var qtdCarrinho = document.getElementById("selectQtd").value;

            if(variacao_padrao == "aro" && variacao_complementar > 0){

                var hiddenApenasAro = document.getElementById("hiddenApenasAro").value;
                var boxApenasAro = document.getElementById("boxApenasAro");
                var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
                var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenApenasAro == ""){

                    boxApenasAro.classList.add("border");
                    boxApenasAro.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxApenasAro.classList.remove("border");
                        boxApenasAro.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else if(hiddenVariacaoAdicional == ""){

                    boxVariacaoAdicional.classList.add("border");
                    boxVariacaoAdicional.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Informações faltando";

                    setTimeout(function(){ 
                        boxVariacaoAdicional.classList.remove("border");
                        boxVariacaoAdicional.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?apenasAro="+hiddenApenasAro+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro="+hiddenApenasAro+"&apenasGravacao=SE&variacaoComplementar="+hiddenVariacaoAdicional+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "unico" && variacao_complementar > 0){

                var hiddenFeminino = document.getElementById("hiddenFeminino").value;
                var boxFeminino = document.getElementById("boxAroFeminino");
                var gravacaoFeminino = document.getElementById("campoGravacaoFeminino").value;
                var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
                var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");
                
                if(hiddenFeminino == ""){

                    boxFeminino.classList.add("border");
                    boxFeminino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxFeminino.classList.remove("border");
                        boxFeminino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else if(hiddenVariacaoAdicional == ""){

                    boxVariacaoAdicional.classList.add("border");
                    boxVariacaoAdicional.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Informações faltando";

                    setTimeout(function(){ 
                        boxVariacaoAdicional.classList.remove("border");
                        boxVariacaoAdicional.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico="+hiddenFeminino+"&gravacaoAnelUnico="+gravacaoFeminino+"&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao=SE&variacaoComplementar="+hiddenVariacaoAdicional+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "casal" && variacao_complementar > 0){

                var hiddenFeminino = document.getElementById("hiddenFeminino").value;
                var boxFeminino = document.getElementById("boxAroFeminino");
                var gravacaoFeminino = document.getElementById("campoGravacaoFeminino").value;
                var hiddenMasculino = document.getElementById("hiddenMasculino").value;
                var boxMasculino = document.getElementById("boxAroMasculino");
                var gravacaoMasculino = document.getElementById("campoGravacaoMasculino").value;
                var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
                var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenFeminino == ""){

                    boxFeminino.classList.add("border");
                    boxFeminino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxFeminino.classList.remove("border");
                        boxFeminino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else if(hiddenMasculino == ""){

                    boxMasculino.classList.add("border");
                    boxMasculino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxMasculino.classList.remove("border");
                        boxMasculino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else if(hiddenVariacaoAdicional == ""){

                    boxVariacaoAdicional.classList.add("border");
                    boxVariacaoAdicional.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Informações faltando";

                    setTimeout(function(){ 
                        boxVariacaoAdicional.classList.remove("border");
                        boxVariacaoAdicional.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico="+hiddenFeminino+"&gravacaoAnelUnico="+gravacaoFeminino+"&anelCasal="+hiddenMasculino+"&gravacaoAnelCasal="+gravacaoMasculino+"&apenasAro=SE&apenasGravacao=SE&variacaoComplementar="+hiddenVariacaoAdicional+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "gravacao" && variacao_complementar > 0){

                var gravacaoApenasGravacao = document.getElementById("campoGravacaoApenasGravacao").value;
                var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
                var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenVariacaoAdicional == ""){

                boxVariacaoAdicional.classList.add("border");
                boxVariacaoAdicional.classList.add("border-danger");
                botaoAdicionarCarrinho.classList.add("bg-danger");
                botaoAdicionarCarrinho.innerHTML = "Informações faltando";

                setTimeout(function(){ 
                    boxVariacaoAdicional.classList.remove("border");
                    boxVariacaoAdicional.classList.remove("border-danger");
                    botaoAdicionarCarrinho.classList.remove("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao="+gravacaoApenasGravacao+"&variacaoComplementar="+hiddenVariacaoAdicional+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "nenhum" && variacao_complementar > 0){

                var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
                var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenVariacaoAdicional == ""){

                boxVariacaoAdicional.classList.add("border");
                boxVariacaoAdicional.classList.add("border-danger");
                botaoAdicionarCarrinho.classList.add("bg-danger");
                botaoAdicionarCarrinho.innerHTML = "Informações faltando";

                setTimeout(function(){ 
                    boxVariacaoAdicional.classList.remove("border");
                    boxVariacaoAdicional.classList.remove("border-danger");
                    botaoAdicionarCarrinho.classList.remove("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao=SE&variacaoComplementar="+hiddenVariacaoAdicional+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "aro" && variacao_complementar < 1){

                var hiddenApenasAro = document.getElementById("hiddenApenasAro").value;
                var boxApenasAro = document.getElementById("boxApenasAro");
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenApenasAro == ""){

                    boxApenasAro.classList.add("border");
                    boxApenasAro.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxApenasAro.classList.remove("border");
                        boxApenasAro.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?apenasAro="+hiddenApenasAro+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro="+hiddenApenasAro+"&apenasGravacao=SE&variacaoComplementar=SE&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "unico" && variacao_complementar < 1){

                var hiddenFeminino = document.getElementById("hiddenFeminino").value;
                var boxFeminino = document.getElementById("boxAroFeminino");
                var gravacaoFeminino = document.getElementById("campoGravacaoFeminino").value;
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenFeminino == ""){

                    boxFeminino.classList.add("border");
                    boxFeminino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxFeminino.classList.remove("border");
                        boxFeminino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico="+hiddenFeminino+"&gravacaoAnelUnico="+gravacaoFeminino+"&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao=SE&variacaoComplementar=SE&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "casal" && variacao_complementar < 1){

                var hiddenFeminino = document.getElementById("hiddenFeminino").value;
                var boxFeminino = document.getElementById("boxAroFeminino");
                var gravacaoFeminino = document.getElementById("campoGravacaoFeminino").value;
                var hiddenMasculino = document.getElementById("hiddenMasculino").value;
                var boxMasculino = document.getElementById("boxAroMasculino");
                var gravacaoMasculino = document.getElementById("campoGravacaoMasculino").value;
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                if(hiddenFeminino == ""){

                    boxFeminino.classList.add("border");
                    boxFeminino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxFeminino.classList.remove("border");
                        boxFeminino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else if(hiddenMasculino == ""){

                    boxMasculino.classList.add("border");
                    boxMasculino.classList.add("border-danger");
                    botaoAdicionarCarrinho.classList.add("bg-danger");
                    botaoAdicionarCarrinho.innerHTML = "Escolha tamanho aro";

                    setTimeout(function(){ 
                        boxMasculino.classList.remove("border");
                        boxMasculino.classList.remove("border-danger");
                        botaoAdicionarCarrinho.classList.remove("bg-danger");
                        botaoAdicionarCarrinho.innerHTML = "ADICIONAR À SACOLA";
                    }, 3000);

                }else{

                    /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                    window.location = "php/adicionarSacola.php?anelUnico="+hiddenFeminino+"&gravacaoAnelUnico="+gravacaoFeminino+"&anelCasal="+hiddenMasculino+"&gravacaoAnelCasal="+gravacaoMasculino+"&apenasAro=SE&apenasGravacao=SE&variacaoComplementar=SE&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

                }

            }else if(variacao_padrao == "gravacao" && variacao_complementar < 1){

                var gravacaoApenasGravacao = document.getElementById("campoGravacaoApenasGravacao").value;
                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao="+gravacaoApenasGravacao+"&variacaoComplementar=SE&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

            }else if(variacao_padrao == "nenhum" && variacao_complementar < 1){

                var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

                /* window.location = "php/adicinarSacola.php?aroFeminino="+hiddenFeminino+"&gravacaoFeminino="+gravacaoFeminino+"&aroMasculino="+hiddenMasculino+"&gravacaoMasculino="+gravacaoMasculino+"&variacaoAdicional="+hiddenVariacaoAdicional; */
                window.location = "php/adicionarSacola.php?anelUnico=SE&gravacaoAnelUnico=SE&anelCasal=SE&gravacaoAnelCasal=SE&apenasAro=SE&apenasGravacao=SE&variacaoComplementar=SE&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

            }

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

            <div class="col-12 col-md-5 border-top pt-3 pb-3">

                <ul id="imageGallery">

                    <li data-thumb="img/produtos/<?php echo $arrProduto["foto"] ?>" data-src="img/produtos/<?php echo $arrProduto["foto"] ?>">
                      <img id="imgSlide" src="img/produtos/<?php echo $arrProduto["foto"] ?>" width="100%"/>
                    </li>

                    <?php

                    if($classeProdutos->retorna_img_galeria($arrProduto["id"]) != false){
                    
                    foreach($classeProdutos->retorna_img_galeria($arrProduto["id"]) as $arrGaleria){
                    
                    ?>
                    
                    <li data-thumb="img/produtos/<?php echo $arrGaleria["caminho"] ?>" data-src="img/produtos/<?php echo $arrGaleria["caminho"] ?>">
                      <img id="imgSlide" src="img/produtos/<?php echo $arrGaleria["caminho"] ?>" width="100%"/>
                    </li>

                    <?php
                    
                    }

                    }   
                    
                    ?>

                </ul>

            </div>

            <div class="col-12 col-md-4 border-top pt-3">

                <h1 class="fs-2 fw-light text-secondary"><?php echo $arrProduto["nome"]; ?></h1>

                <div class="row mt-3">

                    <div class="col-4">

                        <?php
                        
                        if($arrProduto["qtd_estoque"] < 1 || $arrProduto["estado"] != "publicado-disponivel"){
                        
                        ?>

                        <span class="text-black-50">Produto indisponível</span>

                        <?php
                        
                        }else{
                        
                        ?>

                        <select class="mt-2 text-secondary" id="selectQtd">

                            <?php
                                    
                            $i_select = 1;

                            while($i_select <= $arrProduto["qtd_estoque"]){
                            
                            ?>

                            <option value="<?php echo $i_select; ?>">Qtd: <?php echo $i_select; ?></option>

                            <?php

                            $i_select++;
                            
                            }

                            ?>

                        </select>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <div class="col-8 text-end">

                        <?php
                        
                        if($arrProduto["preco_promocao"] != ""){

                        ?>

                        <span class="text-black-50 text-decoration-line-through">R$<?php echo number_format($arrProduto["preco_promocao"], 2, ",", "."); ?></span><br>

                        <?php

                        }
                        
                        ?>

                        <span class="fs-2 text-secondary">R$<?php echo number_format($arrProduto["preco"], 2, ",", "."); ?></span>

                    </div>

                </div>

                <?php
                
                if($arrProduto["variacao_padrao"] == "unico"){

                    $boxFeminino = "";
                    $boxMasculino = "d-none";
                    $boxAro = "d-none";
                    $boxGravacao = "d-none";

                }else if($arrProduto["variacao_padrao"] == "casal"){

                    $boxFeminino = "";
                    $boxMasculino = "";
                    $boxAro = "d-none";
                    $boxGravacao = "d-none";

                }else if($arrProduto["variacao_padrao"] == "aro"){

                    $boxFeminino = "d-none";
                    $boxMasculino = "d-none";
                    $boxAro = "";
                    $boxGravacao = "d-none";

                }else if($arrProduto["variacao_padrao"] == "gravacao"){

                    $boxFeminino = "d-none";
                    $boxMasculino = "d-none";
                    $boxAro = "d-none";
                    $boxGravacao = "";

                }else{

                    $boxFeminino = "d-none";
                    $boxMasculino = "d-none";
                    $boxAro = "d-none";
                    $boxGravacao = "d-none";

                }

                if($arrProduto["id_variacao_produto"] == 0){

                    $variacaoAdd = "d-none";

                }else{

                    $variacaoAdd = "";

                }
                
                ?>

                <!-- Box Feminio -->
                <div class="row justify-content-center mt-4 <?php echo $boxFeminino ?>">

                    <div id="boxAroFeminino" class="boxAro col-11">

                        <div class="row mt-2">

                            <div class="col">

                                <?php
                                
                                if($arrProduto["variacao_padrao"] == "unico"){

                                ?>

                                    <span class="text-secondary">Tamanho do aro</span>

                                <?php

                                }else{

                                ?>

                                    <span class="text-secondary">Tamanho do aro feminino</span>

                                <?php

                                }
                                
                                ?>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2">

                            <div id="botaoAntesFeminino" class="col-1 fs-3"><</div>

                            <div class="col-9">

                                <ul class="col-12 col-md-9" id="aroFeminino">

                                    <?php
                            
                                    $i_aros = 9;

                                    while($i_aros <= 33){
                                    
                                    ?>

                                    <li class="text-center" id="espacoProdutoMaisVendidos">

                                        <div onclick="mudarResultadoAroFeminino(<?php echo $i_aros; ?>)" id="fundoNumeroFeminino-<?php echo $i_aros; ?>" class="fundoNumero">

                                            <span id="numeroAro"><?php echo $i_aros; ?></span>
        
                                        </div>
                      
                                    </li>

                                    <?php

                                    $i_aros++;
                                    
                                    }
                                    
                                    ?>

                                </ul>

                                <input type="hidden" id="hiddenFeminino">

                            </div>

                            <div id="botaoDepoisFeminino" class="col-1 fs-3">></div>

                        </div>

                        <div class="row mt-3 mb-3">

                            <div class="col text-center text-secondary">

                                Gravação: <input class="campoGravacao text-secondary" id="campoGravacaoFeminino" type="text" maxlength="<?php echo $arrProduto["qtd_caracteres"]; ?>">

                            </div>

                        </div>

                    </div>

                </div>
                <!-- //Box Feminio -->

                <!-- Box masculino -->
                <div class="row justify-content-center mt-4 <?php echo $boxMasculino ?>">

                    <div id="boxAroMasculino" class="boxAro col-11">

                        <div class="row mt-2">

                            <div class="col">

                                <span class="text-secondary">Tamanho do aro masculino</span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2">

                            <div id="botaoAntesMasculino" class="col-1 fs-3"><</div>

                            <div class="col-9">

                                <ul class="col-12 col-md-9" id="aroMasculino">

                                    <?php
                            
                                    $i_aros = 9;

                                    while($i_aros <= 33){
                                    
                                    ?>

                                    <li class="text-center" id="espacoProdutoMaisVendidos">

                                        <div onclick="mudarResultadoAroMasculino(<?php echo $i_aros; ?>)" id="fundoNumeroMasculino-<?php echo $i_aros; ?>" class="fundoNumero">

                                            <span id="numeroAro"><?php echo $i_aros; ?></span>
        
                                        </div>
                      
                                    </li>

                                    <?php

                                    $i_aros++;
                                    
                                    }
                                    
                                    ?>

                                </ul>
                                
                                <input type="hidden" id="hiddenMasculino">

                            </div>

                            <div id="botaoDepoisMasculino" class="col-1 fs-3">></div>

                        </div>

                        <div class="row mt-3 mb-3">

                            <div class="col text-center text-secondary">

                                Gravação: <input class="campoGravacao text-secondary" id="campoGravacaoMasculino" type="text" maxlength="<?php echo $arrProduto["qtd_caracteres"]; ?>">

                            </div>

                        </div>

                    </div>

                </div>
                <!-- //Box masculino -->

                <!-- Apenas Tamanho do aro -->
                <div class="row justify-content-center mt-4 <?php echo $boxAro ?>">

                    <div id="boxApenasAro" class="boxAro col-11">

                        <div class="row mt-2">

                            <div class="col">

                                <span class="text-secondary">Tamanho do aro</span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div id="botaoAntesApenasAro" class="col-1 fs-3"><</div>

                            <div class="col-9">

                                <ul class="col-12 col-md-9" id="aroApenasAro">

                                    <?php
                            
                                    $i_aros = 9;

                                    while($i_aros <= 33){
                                    
                                    ?>

                                    <li class="text-center" id="espacoProdutoMaisVendidos">

                                        <div onclick="mudarResultadoApenasAro(<?php echo $i_aros; ?>)" id="fundoNumeroApenasAro-<?php echo $i_aros; ?>" class="fundoNumero">

                                            <span id="numeroAro"><?php echo $i_aros; ?></span>
        
                                        </div>
                      
                                    </li>

                                    <?php

                                    $i_aros++;
                                    
                                    }
                                    
                                    ?>

                                </ul>

                                <input type="hidden" id="hiddenApenasAro">

                            </div>

                            <div id="botaoDepoisApenasAro" class="col-1 fs-3">></div>

                        </div>

                    </div>

                </div>
                <!-- //Apenas Tamanho do aro -->

                <!-- Apenas Gravação -->
                <div class="row justify-content-center mt-4 <?php echo $boxGravacao ?>">

                    <div id="boxAro" class="boxAro col-11">

                        <div class="row mt-3 mb-3">

                            <div class="col text-center text-secondary">

                                Gravação: <input class="campoGravacao text-secondary" id="campoGravacaoApenasGravacao" type="text" maxlength="<?php echo $arrProduto["qtd_caracteres"]; ?>">

                            </div>

                        </div>

                    </div>

                </div>
                <!-- //Apenas Gravação -->

                <!-- Variação Adicional -->
                <div class="row justify-content-center mt-4 <?php echo $variacaoAdd; ?>">

                    <div id="boxVariacaoAdicional" class="boxAro col-11">

                        <div class="row mt-2">

                            <div>

                                <?php
                                
                                foreach($classeProdutos->retorna_opcoes_variacoes($arrProduto["id_variacao_produto"]) as $arrVariacao){
                                
                                ?>

                                <span class="text-secondary"><?php echo $arrVariacao["texto_cliente"]; ?></span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div>

                                <select class="text-secondary" id="selectVariacao" onchange="mudarResultadoVariacaoAdicional(this.value)">

                                    <option disabled selected hidden>Escolher</option>

                                    <?php

                                    foreach($classeProdutos->formatar_op_variacoes($arrVariacao["opcoes"]) as $arrVar){

                                    ?>

                                        <option value="<?php echo $arrVar ?>"><?php echo $arrVar ?></option>

                                    <?php

                                    }
                                    
                                    ?>
        
                                </select>

                                <input type="hidden" id="hiddenVariacaoAdicional">

                                <?php
                                
                                }
                                
                                ?>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- //Variação Adicional -->

                <!-- Calculo do frete -->
                <div class="row justify-content-center mt-4 pt-3">

                    <div class="col-10">

                        <label class="text-secondary" for="inputCalculaFrete">Digite seu CEP e pressione enter</label><br>
                        <input type="text" id="inputCalculaFrete" autocomplete="off" class="maskCep">

                    </div>

                </div>

                <div class="row justify-content-center mt-5 d-none" id="areaFrete">

                    <!-- <div class="col-10 text-center">

                        <b>Sedex:</b> R$34,50 - 3 dias para entrega<br>
                        <b>PAC:</b> R$34,50 - 3 dias para entrega

                    </div> -->

                </div>

                <script type="text/javascript">
                                                                                
                    function calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega) {

                        $.ajax({

                            type: "POST",
                            dataType: "html",

                            url: "php/frete.php",

                            beforeSend: function () {

                                $("#areaFrete").html("<img class='imgLoading' src='img/loading2.gif'>");
                                /* $("#areaFrete").html("Carregando"); */

                            },

                            data: {cep: cep, peso: peso, altura: altura, largura: largura, comprimento: comprimento, dias_entrega: dias_entrega},

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

                    $("#inputCalculaFrete").keypress(function(event){

                        var cep = document.getElementById("inputCalculaFrete").value;
                        var campoCep = document.getElementById("areaFrete");

                        var peso = "<?php echo $arrProduto['peso']; ?>";
                        var altura = "<?php echo $arrProduto['altura']; ?>";
                        var largura = "<?php echo $arrProduto['largura']; ?>";
                        var comprimento = "<?php echo $arrProduto['comprimento']; ?>";
                        var dias_entrega = "<?php echo $arrProduto['dias_entrega']; ?>";

                        if ( event.which == 13) {
                            if(cep == ""){

                                campoCep.classList.add("d-none");

                            }else{

                                calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega);

                            }
                        }

                    });

                    </script>
                <!-- //Calculo do frete -->

                <!-- Botao Add a sacola -->
                <div class="row justify-content-center mt-4 pt-4 pb-4">

                    <div class="col-10 text-center">

                        <?php
                        
                        if($arrProduto["qtd_estoque"] < 1 || $arrProduto["estado"] != "publicado-disponivel"){
                        
                        ?>

                        <span class="text-black-50">Produto indisponível</span>

                        <button class="mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoVerMaisOpcoes">VER OPÇÕES SIMILARES</button>

                        <?php
                        
                        }else{
                        
                        ?>

                        <?php
                        
                        $variacao_padrao = $arrProduto['variacao_padrao'];
                        $variacao_complementar = $arrProduto['id_variacao_produto'];

                        if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){
                        
                        ?>

                        <button onclick="cadastrarProdutoCarrinho('<?php echo $variacao_padrao ?>', <?php echo $variacao_complementar ?>)" id="botaoAddCarrinho">ADICIONAR À SACOLA</button>

                        <?php
                        
                        }else{
                        
                        ?>

                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoAddCarrinho">ADICIONAR À SACOLA</button>

                        <?php
                            
                        }
                        
                        ?>

                        <?php
                            
                        }
                        
                        ?>

                    </div>

                </div>
                <!-- //Botao Add a sacola -->

            </div>

        </div>

        <!-- Caracteristicas -->
        <div class="row justify-content-center">

            <div class="col-md-9 border-top pt-4">

                <h2 class="fs-2 fw-light text-secondary">Características gerais</h2>

                <pre id="caracteristicasGerais" class="text-secondary"><?php echo $arrProduto["descricao"]; ?></pre>

            </div>

        </div>
        <!-- //Caracteristicas -->

    <?php

    $id_produto = $arrProduto["id"];
    
    }
    
    ?>

        <div class="row mt-5 justify-content-center">

            <div class="col-md-9 pt-3 border-top">
  
                <p class="pb-2"><span class="text-secondary fs-4">Produtos relacionados</span></p>
  
            </div>
  
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-md-9">
    
              <ul class="col-12 col-md-9" id="espacoItem">

              <?php

              $id_categoria =  $classeProdutos->retorna_nome_categoria_produto($id_produto);
              
              foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                $str6 = preg_replace('/[ç]/ui', 'c', $str5);
              
              ?>
    
                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">
    
                    <img src="img/produtos/<?php echo $arrRelacionados["foto"]; ?>" id="fotoAnel">
    
                    <p class="card-text mt-1 pt-2 border-top"><?php echo $arrRelacionados["nome"]; ?></p>
    
                    <small class="text-decoration-line-through <?php if($arrRelacionados["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrRelacionados["preco_promocao"], 2, ",", "."); ?></small>
                    <h5 class="card-title">R$<?php echo number_format($arrRelacionados["preco"], 2, ",", "."); ?></h5>
    
                  </div>
    
                </li>

                <?php
                
                }
                
                ?>

                <?php

                $id_categoria =  $classeProdutos->retorna_nome_categoria_produto(0);

                foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                    $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

                ?>

                <li class="text-center" id="espacoProdutoMaisVendidos">

                    <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                    <img src="img/produtos/<?php echo $arrRelacionados["foto"]; ?>" id="fotoAnel">

                    <p class="card-text mt-1 pt-2 border-top"><?php echo $arrRelacionados["nome"]; ?></p>

                    <small class="text-decoration-line-through <?php if($arrRelacionados["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrRelacionados["preco_promocao"], 2, ",", "."); ?></small>
                    <h5 class="card-title">R$<?php echo number_format($arrRelacionados["preco"], 2, ",", "."); ?></h5>

                    </div>

                </li>

                <?php
                
                }
                
                ?>

                <?php

                $id_categoria =  $classeProdutos->retorna_nome_categoria_produto(0);

                foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                    $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

                ?>

                <li class="text-center" id="espacoProdutoMaisVendidos">

                    <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                    <img src="img/produtos/<?php echo $arrRelacionados["foto"]; ?>" id="fotoAnel">

                    <p class="card-text mt-1 pt-2 border-top"><?php echo $arrRelacionados["nome"]; ?></p>

                    <small class="text-decoration-line-through <?php if($arrRelacionados["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrRelacionados["preco_promocao"], 2, ",", "."); ?></small>
                    <h5 class="card-title">R$<?php echo number_format($arrRelacionados["preco"], 2, ",", "."); ?></h5>

                    </div>

                </li>

                <?php

                }

                ?>
    
              </ul>
    
            </div>
    
        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>
    
</body>

</html>