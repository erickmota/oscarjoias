<!-- Oscar Jóias e Acessório
Desenvolvido por: Erick Mota (erickmota.com) -->

<html>

<head>

    <title>Oscar Jóias e Acessórios</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="lightslider/src/js/lightslider.js"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/home.css">

</head>

<script>

  /* Promoções */
  $(document).ready(function() {
    $('#espacoItem').lightSlider({
        item:4,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

        speed: 700, //ms'
        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: 4000,
        responsive : [
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
  /* //Promoções */

</script>

<body>

    <div class="container-fluid">

      <?php
      
      /* Cabeçalho */
      include "phpPartes/cabecalho.php";
      
      ?>

    </div>

    <div class="container-fluid" id="divSlide">

      <!-- Slide -->
      <div class="row">

          <div class="col" id="espacoFoto">

              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img id="imgSlide" src="img/slides/slide1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img id="imgSlide" src="img/slides/slide2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img id="imgSlide" src="img/slides/slide3.jpg" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </div>

          </div>

      </div>
      <!-- //Slide -->

    </div>

    <div class="container-fluid">

      <!-- Bem vindo -->
      <div class="row justify-content-center mt-5">

          <div class="col-md-9 text-center">

              <img src="img/bemVindo.png">

              <p class="mt-4 text-secondary fst-italic">

                  é um tema responsivo para quem quer uma joalheria on-line, com estilo e qualidade. Com SEO otimizado, ilimitadas opções de cores e com sistema WooCommerce, você consegue ter uma loja para ninguém botar defeito.

              </p>

          </div>

      </div>
      <!-- //Bem vindo -->

      <!-- Os mais vendidos -->
      <div class="row mt-5 justify-content-center">

          <div class="col-md-9">

              <p class="border-bottom pb-2"><span class="text-secondary fs-4">Nossas Promoções</span> <button id="botaoVerPromocoes">Ver tudo</button></p>

          </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-12 col-md-9">

          <ul class="col-12 col-md-9" id="espacoItem">

            <li class="text-center" id="espacoProdutoMaisVendidos">

                  <div class="box">

                    <img src="img/aneis/5.jpg" id="fotoAnel">

                    <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                    <h5 class="card-title">R$500,00</h5>

                  </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/2.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g Anel porta objetos 400g</p>

                <small class="text-decoration-line-through">R$500,00</small>
                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/3.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/4.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/1.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/2.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/3.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/4.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/1.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

            <li class="text-center" id="espacoProdutoMaisVendidos">

              <div class="box">

                <img src="img/aneis/2.jpg" id="fotoAnel">

                <p class="card-text mt-1 pt-2 border-top">Anel porta objetos 400g</p>

                <h5 class="card-title">R$500,00</h5>

              </div>

            </li>

          </ul>

        </div>

      </div>
      <!-- //Os mais vendidos -->

      <div class="row mt-5 justify-content-center">

        <div class="col-md-9">

            <p class="border-bottom pb-2"><span class="text-secondary fs-4">Categorias</span> <button id="botaoVerPromocoes">Ver todas</button></p>

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-11 col-md-9">

          <div class="row">

            <div class="col-12 col-md-3 text-center" id="itemCategoria">

              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/brinde.png" width="70px"><br>Alianças de noivado</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/anel.png" width="70px"><br>Alianças de casamento</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/formatura.png" width="70px"><br>Anéis de formatura</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/letra.png" width="70px"><br>Anéis de letra</span>

              </div>
  
            </div>

          </div>

          <div class="row">

            <div class="col-12 col-md-3 text-center" id="itemCategoria">

              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/coracao.png" width="70px"><br>Aliança de namoro em prata</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/bebe.png" width="70px"><br>Pulseira de chapinha infantil</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/diamante.png" width="70px"><br>Anéis cálice</span>

              </div>
  
            </div>
  
            <div class="col-12 col-md-3 text-center" id="itemCategoria">
  
              <div id="boxCategoria">

                <span id="textoItemCategoria" class="fw-bold"><img src="img/direita.png" width="70px"><br>Outras categorias</span>

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