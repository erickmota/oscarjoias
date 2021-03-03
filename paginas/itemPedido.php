<html>

<head>

    <title>Oscar Jóias e Acessórios</title>

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

    <link rel="stylesheet" href="css/itemPedido.css">

</head>

<body>

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center">

            <div class="col-md-9 pt-3 pb-1">

                <h1 class="fs-2 fw-light text-secondary" id="nome">Pedido 154888510415</h1>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-9 border-top">

                <div class="row">

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center ativo">

                            <span id="textoBoxProcesso">EM<br>PORCESSAMENTO<br><img src="img/ok.png" width="25px"></span>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center ativo">

                            <span id="textoBoxProcesso">PREPARADNDO<br>PRODUTO<br><img src="img/loading2.gif" width="100px"></span>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center">

                            <span id="textoBoxProcesso">EM<br>TRANSPORTE</span>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center">

                            <span id="textoBoxProcesso">ENTREGUE<br>AO<br>DESTINATÁRIO</span>

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