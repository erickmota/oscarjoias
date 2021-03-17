<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();
    
    ?>

    <title>ADM/Produtos Cadastrados - Oscar Jóias e Acessórios</title>

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

    <link rel="stylesheet" href="css/adm_produtos_cadastrados.css">

    <script>

        function mudar_estado(valor){

            if(valor == "tudo"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["estado"])){

                    $novaUrl = str_replace($_GET["estado"], "tudo", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["org"])){

                        $novaUrl = $urlAtual."&estado=tudo";

                    }else{

                        $novaUrl = $urlAtual."?estado=tudo";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }else if(valor == "publicado-disponivel"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["estado"])){

                    $novaUrl = str_replace($_GET["estado"], "publicado-disponivel", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["org"])){

                        $novaUrl = $urlAtual."&estado=publicado-disponivel";

                    }else{

                        $novaUrl = $urlAtual."?estado=publicado-disponivel";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }else if(valor == "publicado-nao-disponivel"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["estado"])){

                    $novaUrl = str_replace($_GET["estado"], "publicado-nao-disponivel", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["org"])){

                        $novaUrl = $urlAtual."&estado=publicado-nao-disponivel";

                    }else{

                        $novaUrl = $urlAtual."?estado=publicado-nao-disponivel";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }else if(valor == "rascunho"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["estado"])){

                    $novaUrl = str_replace($_GET["estado"], "rascunho", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["org"])){

                        $novaUrl = $urlAtual."&estado=rascunho";

                    }else{

                        $novaUrl = $urlAtual."?estado=rascunho";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }

        }

        function mudar_organizacao(valor){

            if(valor == "ua"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["org"])){

                    $novaUrl = str_replace($_GET["org"], "DESC", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["estado"])){

                        $novaUrl = $urlAtual."&org=DESC";

                    }else{

                        $novaUrl = $urlAtual."?org=DESC";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }else if(valor == "pa"){

                <?php
                    
                $urlAtual = $_SERVER["REQUEST_URI"];

                if(isset($_GET["org"])){

                    $novaUrl = str_replace($_GET["org"], "ASC", $urlAtual);

                }else{

                    if(isset($_GET["q"]) || isset($_GET["estado"])){

                        $novaUrl = $urlAtual."&org=ASC";

                    }else{

                        $novaUrl = $urlAtual."?org=ASC";

                    }

                }
                    
                ?>

                window.location="<?php echo $novaUrl; ?>";

            }

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

                        <h1>Produtos Cadastrados</h1>

                    </div>

                </div>

                <div class="row mt-4">

                    <div class="col-12 col-sm-6">

                        <form method="GET" action="adm/produtos-cadastrados">

                            <input type="text" class="form-control" placeholder="Buscar Produto" name="q">

                        </form>

                    </div>

                    <div class="col-12 col-sm-6">

                        <div class="row">

                            <div class="col">

                                <select class="form-select" onchange="mudar_estado(this.value)">
    
                                    <option disabled selected hidden>Estado</option>
                                    <option value="tudo">Mostrar todos</option>
                                    <option value="publicado-disponivel">Publicado - disponível</option>
                                    <option value="publicado-nao-disponivel">Publicado - não disponível</option>
                                    <option value="rascunho">Rascunho</option>
        
                                </select>
    
                            </div>
    
                            <div class="col">
    
                                <select class="form-select" onchange="mudar_organizacao(this.value)">
    
                                    <option disabled selected hidden>Organizar por</option>
                                    <option value="ua">Último adicionado</option>
                                    <option value="pa">Primeiro adicionado</option>
        
                                </select>
    
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col text-center">

                        <div class="table-responsive">

                            <?php

                            if(isset($_GET["org"])){

                                $organizar = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["org"]);

                            }else{

                                $organizar = "DESC";

                            }

                            if(isset($_GET["q"])){

                                $busca = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["q"]);

                            }else{

                                $busca = "SE";

                            }

                            if(isset($_GET["estado"])){

                                if($_GET["estado"] == "tudo"){

                                    $estado = "SE";

                                }else{

                                    $estado = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["estado"]);

                                }

                            }else{

                                $estado = "SE";

                            }
                                        
                            $funcRetornaCliente = $classeProdutos->retorna_produtos_adm($busca, $estado, $organizar);

                            if($funcRetornaCliente == false){

                            ?>

                            <span class="text-secondary">Nenhum Produtos Encontrado<span>

                            <?php

                            }else{
                            
                            ?>

                            <table class="table table-bordered text-center">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Estoque</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                    foreach($funcRetornaCliente as $arrProdutos){

                                        $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
                                        $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                                        $str1 = preg_replace('/[áàãâä]/ui', 'a', $transformarEmMinuscula);
                                        $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                        $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                        $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                        $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                        $nomeProduto = preg_replace('/[ç]/ui', 'c', $str5);
                                    
                                    ?>

                                    <tr>

                                        <td>

                                            <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="imgProduto">

                                        </td>
                                        <td class="align-middle"><?php echo $arrProdutos["nome"]; ?></td>
                                        <td class="align-middle">R$<?php echo number_format($arrProdutos["preco"], 2, ",", "."); ?></td>
                                        <td class="align-middle"><?php echo $arrProdutos["qtd_estoque"]; ?></td>
                                        <td class="align-middle"><?php echo $arrProdutos["estado"]; ?></td>
                                        <td class="align-middle">

                                            <a href="produto/<?php echo $nomeProduto; ?>" target="_blank"><button type="button" class="btn btn-secondary">Visualizar</button></a>

                                        </td>
                                        <td class="align-middle">

                                        <a href="adm/editar-produto?produto=<?php echo $arrProdutos["id"]; ?>"><button type="button" class="btn btn-primary">Editar</button></a>

                                        </td>
                                    </tr>

                                    <?php
                                    
                                    }
                                    
                                    ?>

                            <?php

                            }
                            
                            ?>

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>