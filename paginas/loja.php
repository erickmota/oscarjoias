<html>

<head>

    <title>Loja - Oscar Jóias e Acessórios</title>

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
            precoAntigo.classList.add("d-none");

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
            precoAntigo.classList.remove("d-none");

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

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <!-- Cabecalho Filtro -->
        <div class="row justify-content-center">

            <div class="col-12 col-md-9 border-top pt-3">

                <div class="row">

                    <div class="col-6 text-secondary">

                        Mostrando 12 de 87 itens
        
                    </div>
        
                    <div class="col-3 text-end">

                        <img onclick="mostrarMenuFiltro()" id="imgFiltro" src="img/filtro.png">

                    </div>
        
                    <div class="col-3">
    
                        <select id="campoSelect" class="text-secondary">
    
                            <option disabled selected hidden>Organizar por</option>
                            <option>Nome</option>
                            <option>Último adicionado</option>
                            <option>Primeiro Adicionado</option>
                            <option>Menor Preço</option>
                            <option>Maior Preço</option>
    
                        </select>
    
                    </div>

                </div>

                <!-- Menu Filtro -->
                <div id="espacoMenuFiltro" class="row justify-content-center d-none">

                    <div class="col-12 col-md-9 mt-2" id="espacoFiltro">

                        <div class="row row justify-content-center pb-3">

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <select id="campoSelect" class="text-secondary">
    
                                    <option disabled selected hidden>Tipo</option>
                                    <option>Nome</option>
                                    <option>Último adicionado</option>
                                    <option>Primeiro Adicionado</option>
                                    <option>Menor Preço</option>
                                    <option>Maior Preço</option>
            
                                </select>

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <select id="campoSelect" class="text-secondary">
    
                                    <option disabled selected hidden>Marca</option>
                                    <option>Nome</option>
                                    <option>Último adicionado</option>
                                    <option>Primeiro Adicionado</option>
                                    <option>Menor Preço</option>
                                    <option>Maior Preço</option>
            
                                </select>

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <input id="campoSelect" type="number" placeholder="Valor Máximo">

                            </div>

                            <div class="col-12 col-sm-6 col-md-3 mt-3">

                                <button id="botaoFiltrar">FILTRAR</button>

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
        <div class="row justify-content-center">

            <div class="col-md-9 border-top mt-3 pt-3">

                <small id="itemFiltro">Ouro</small>

                <small id="itemFiltro">Azara</small>

                <small id="itemFiltro">R$1500,00</small>
                
                <small class="ms-3"><a href="#" class="text-secondary">limpar filtro</a></small>

            </div>

        </div>
        <!-- //Itens filtro -->

        <!-- Espaço dos itens -->
        <div class="row justify-content-center">

            <div class="col-md-9 text-center">

                <div class="row">

                    <div class="col-12">

                        <div class="row">

                            <div class="col-12 col-sm-6 col-lg-4">

                                <div onclick="window.location='produto'" class="box" onmouseover="mudarItemAdd(1)" onmouseout="mudarItemRemove(1)">

                                    <img src="img/aneis/4.jpg" id="fotoAnel">
                
                                    <p id="nomeItem1" class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>
                
                                    <small id="precoAntigo2" class="text-decoration-line-through">R$500,00</small>
                                    <h5 id="precoItem1" class="card-title">R$500,00</h5>

                                    <p id="precoItemGrande1" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$500,00</p>

                                    <button class="botaoComprar d-none" id="botaoComprar1">COMPRAR</button>
                
                                </div>

                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>

        </div>
        <!-- //Espaço dos itens -->

        <div class="row justify-content-center mt-5">

            <div class="col-md-9 text-center">

                <div id="numeroPaginacao"><span><<</span></div>

                <div id="numeroPaginacao"><span>4</span></div>

                <div id="numeroPaginacao" class="ativo"><span>5</span></div>
                
                <div id="numeroPaginacao"><span>6</span></div>

                <div id="numeroPaginacao"><span>></span></div>

            </div>

        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>