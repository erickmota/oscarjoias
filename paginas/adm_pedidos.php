<html>

<head>

    <title>ADM/Pedidos - Oscar Jóias</title>

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

    <link rel="stylesheet" href="css/adm_pedidos.css">

    <script>

        function alterar_status_entrega(status, id_pedido){

            window.location="php/alterar_status_entrega.php?status="+status+"&id_pedido="+id_pedido;

        }

    </script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-3 d-none d-md-block">

                <!-- Menu -->

            </div>

            <div class="col-12 col-md-9 offset-md-3">

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h1>Pedidos</h1>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-12 col-sm-6">

                        <form method="GET" action="adm/pedidos">

                            <input type="text" class="form-control" placeholder="Buscar por cód ou cliente" name="q">

                        </form>

                    </div>

                    <div class="col-12 col-sm-6">



                    </div>

                </div>

                <div class="row mt-3 justify-content-center" id="corpoPedido">

                    <div class="col">
        
                        <div class="table-responsive">
        
                            <table class="table text-center" id="corpoPedidos">
        
                            </table>
        
                            <script type="text/javascript">
                                                                                        
                                    function retorna_pedidos(busca) {
                
                                        $.ajax({
                
                                            type: "POST",
                                            dataType: "html",
                
                                            url: "ajax/retorna_pedidos_adm.php",
                
                                            beforeSend: function () {
                
                                                $("#corpoPedidos").html("<img class='imgLoading mt-4' src='img/loading2.gif' width='200px'><br><p>Trazendo informações</p>");
                
                                            },
                
                                            data: {busca: busca},
                
                                            success: function (msg) {
                
                                                $("#corpoPedidos").html(msg);
                
                                                /* setTimeout(function() {
                                                    $("#areaIconeOk").html("");
                                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                                }, 3000); */
                
                                            }
                
                                        });
                
                                    }
                
                                    $(document).ready(function(){

                                        <?php
                                        
                                        if(isset($_GET["q"])){

                                            $busca = $_GET["q"];

                                        }else{

                                            $busca = "SE";

                                        }
                                        
                                        ?>

                                        var busca = "<?php echo $busca; ?>";
                
                                        retorna_pedidos(busca);
                
                                    });
                
                            </script>
        
                        </div>
        
                    </div>
        
                </div>

            </div>

        </div>

    </div>
    
</body>

</html>