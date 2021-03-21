<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();

    include "classes/adm.class.php";
    $classeAdm = new adm();
    
    ?>

    <title>ADM - Configurações - Oscar Jóias</title>

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

    <link rel="stylesheet" href="css/adm_configuracoes.css">

</head>

<body>

    <div class="container-fluid">

        <div class="row">

          <?php
            
          include "phpPartes/menu_adm.php";
          
          ?>

            <div class="col-12 col-md-9 offset-md-3">

                <div class="row mt-3">

                    <div class="col text-secondary">

                      <img id="iconeMenu" class="float-start mt-1 me-3 d-block d-md-none" src="img/iconeMenu2.png" width="30px"><h1>Configurações</h1>

                    </div>

                </div>

                <script src="jsPartes/adm_menu_mobile.js"></script>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h2>Categorias</h2>
                        <p>Quando você adiciona uma categoria que ainda não existe ao cadastrar um novo produto, ela é criada automaticamente,
                        mas você pode gerenciá-las por aqui!
                        </p>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col text-secondary text-end">

                        <span class="badge bg-primary rounded-pill" title="Produtos Cadastrados">Produtos cadastrados</span>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <ul class="list-group">

                            <?php
                            
                            foreach($classeProdutos->retorna_categorias() as $arrCategoria){

                                $id_categoria = $arrCategoria["id"];
                            
                            ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <?php echo $arrCategoria["nome"]; ?>
                              <div>

                                <span class="badge bg-primary rounded-pill" title="Produtos Cadastrados">
                                    <?php echo $classeProdutos->retorna_qtd_produtos_por_categoria($arrCategoria["id"]); ?>
                                </span>
                                <a href="php/apagar_categoria.php?id_categoria=<?php echo $id_categoria; ?>"><img src="img/remover.png" width="22px"></a>

                              </div>
                            </li>

                            <?php
                            
                            }
                            
                            ?>

                        </ul>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col">

                        <form class="row g-3" method="POST" action="php/adm_adicionar_categoria.php">
                            <div class="col-auto">
                              <input type="text" class="form-control" placeholder="Categoria" maxlength="30" name="nome" required>
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">ADICIONAR</button>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h2>Slide</h2>
                        <p>Slide da página inicial</p>

                    </div>

                </div>

                <div class="row mt-2 mb-5">

                    <div class="col-12 col-sm-5 mb-4">

                        <p class="text-secondary">Essa é uma amostra de imagem com a resolução ideal para colocar no slide (1920 x 725), clique para baixar!</p>

                        <img style="cursor: pointer;" onclick="window.open('img/slides/exemplo.zip')" src="img/slides/exemplo.jpg" width="100%">

                    </div>

                    <div class="col-12 col-sm-7">

                        <p class="text-secondary">Selecione a imagem ou o link e clique em "salvar". Para desativar link, deixe o campo em branco</p>

                        <?php
                        
                        foreach($classeAdm->retorna_slide_link() as $arrAdm){
                        
                        ?>

                        <small class="text-secondary">Slide 1</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="1" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 1</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_1"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="1" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Slide 2</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="2" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 2</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_2"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="2" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Slide 3</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="3" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 3</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_3"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="3" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>