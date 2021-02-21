<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    $classeCompra->idCliente = 1;
    
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

    <script>

        function mudar_qtd_produto(qtd, id_sacola){

            window.location="php/mudarQtdProdutoCarrinho.php?id_sacola="+id_sacola+"&nova_qtd="+qtd;

        }

        function apagar_produto(id_sacola){

            window.location="php/apagarProdutoCarrinho.php?id_sacola="+id_sacola;

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

            <div class="col-md-9 border-top pt-3 pb-3">

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

                        <button type="button" class="btn btn-secondary">Comprar mais</button>

                    </div>

                    <div class="col-7 text-end">

                        <a href="php/apagarProdutoCarrinho.php?limpar=sim" class="text-secondary me-5 d-none d-md-inline">Esvaziar Sacola</a>

                        <span class="text-secondary me-2">Total</span><span class="fs-4">R$<?php echo number_format($preco_total, 2, ",", ".") ?></span>

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
                                <input type="text" id="inputCalculaFrete">
        
                            </div>
        
                        </div>
                        <!-- //Calculo do frete -->
        
                    </div>
        
                    <div class="col-md-5">
        
                        <div class="row mt-4">
        
                            <div class="col">
        
                                <button id="botaoFinalizar">FINALIZAR COMPRA</button>
        
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