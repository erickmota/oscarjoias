<html>

<head>

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

                        <form>

                            <input type="text" class="form-control" placeholder="Buscar Produto">

                        </form>

                    </div>

                    <div class="col-12 col-sm-6">

                        <div class="row">

                            <div class="col">

                                <select class="form-select">
    
                                    <option disabled selected hidden>Estado</option>
                                    <option>Mostrar todos</option>
                                    <option>Publicado - disponível</option>
                                    <option>Publicado - não disponível</option>
                                    <option>Rascunho</option>
        
                                </select>
    
                            </div>
    
                            <div class="col">
    
                                <select class="form-select">
    
                                    <option disabled selected hidden>Organizar por</option>
                                    <option>Nome</option>
                                    <option>Último adicionado</option>
                                    <option>Primeiro adicionado</option>
        
                                </select>
    
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col">

                        <div class="table-responsive">

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
                                    <tr>
                                        <td>

                                            <img src="img/produtos/120022021015231-42.jpg" id="imgProduto">

                                        </td>
                                        <td class="align-middle">Alianças Namoro Prata Diamantadas</td>
                                        <td class="align-middle">R$1280,99</td>
                                        <td class="align-middle">20</td>
                                        <td class="align-middle">Publicado - não disponível</td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-secondary">Visualizar</button>

                                        </td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-primary">Editar</button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>

                                            <img src="img/produtos/120022021015231-42.jpg" id="imgProduto">

                                        </td>
                                        <td class="align-middle">Alianças Namoro Prata Diamantadas</td>
                                        <td class="align-middle">R$1280,99</td>
                                        <td class="align-middle">20</td>
                                        <td class="align-middle">Publicado - não disponível</td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-secondary">Visualizar</button>

                                        </td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-primary">Editar</button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>

                                            <img src="img/produtos/120022021015231-42.jpg" id="imgProduto">

                                        </td>
                                        <td class="align-middle">Alianças Namoro Prata Diamantadas</td>
                                        <td class="align-middle">R$1280,99</td>
                                        <td class="align-middle">20</td>
                                        <td class="align-middle">Publicado - não disponível</td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-secondary">Visualizar</button>

                                        </td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-primary">Editar</button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>

                                            <img src="img/produtos/120022021015231-42.jpg" id="imgProduto">

                                        </td>
                                        <td class="align-middle">Alianças Namoro Prata Diamantadas</td>
                                        <td class="align-middle">R$1280,99</td>
                                        <td class="align-middle">20</td>
                                        <td class="align-middle">Publicado - não disponível</td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-secondary">Visualizar</button>

                                        </td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-primary">Editar</button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>

                                            <img src="img/produtos/120022021015231-42.jpg" id="imgProduto">

                                        </td>
                                        <td class="align-middle">Alianças Namoro Prata Diamantadas</td>
                                        <td class="align-middle">R$1280,99</td>
                                        <td class="align-middle">20</td>
                                        <td class="align-middle">Publicado - não disponível</td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-secondary">Visualizar</button>

                                        </td>
                                        <td class="align-middle">

                                            <button type="button" class="btn btn-primary">Editar</button>

                                        </td>
                                    </tr>
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