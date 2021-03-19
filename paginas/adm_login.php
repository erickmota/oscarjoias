<html>

<head>

    <title>ADM - Login - Oscar Jóias</title>

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

    <link rel="stylesheet" href="css/adm_login.css">

</head>

<body>

    <div class="container-fluid">

        <div class="row" id="fundo">

            <div class="col" id="conteudo">

                <div class="row">

                    <div class="col text-center">
        
                        <img src="img/logo.png" id="logo" width="100%">
        
                    </div>
        
                </div>

                <div class="row justify-content-center mt-4">

                    <div class="col-3 text-center">

                        <form method="POST" action="php/login_adm.php">
        
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required>
        
                    </div>
        
                </div>

                <div class="row justify-content-center mt-2">

                    <div class="col-3 text-center">
        
                        <input type="password" class="form-control" placeholder="Senha" name="senha" required>
        
                    </div>
        
                </div>

                <div class="row justify-content-center mt-2">

                    <div class="col-3 text-center">
        
                        <button type="submit" class="form-control btn btn-primary">ENTRAR</button>

                        </form>
        
                    </div>
        
                </div>

                <div class="row mt-5">

                    <div class="col text-center">
        
                        <span class="text-black-50 fs-4">ADM</span>
        
                    </div>
        
                </div>

            </div>

        </div>

    </div>

</body>

</html>