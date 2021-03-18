<?php

    include "../classes/produtos.class.php";

    $qtdGaleria = $_POST["qtd-galeria"];

    if($qtdGaleria == ""){

        $qtdGaleria = 0;

    }

    $idProduto = $_POST["id_produto"];
    $nome = $_POST["nome"];
    $capa = $_FILES["capa"];
    $hiddenCapa = $_POST["hidden-capa"];
    $hiddenCaminhoCapa = $_POST["hidden-caminho-capa"];
    $qtdGaleriaAtual = $_POST["qtd-galeria_atual"];

    $i = 0;

    while($i < $qtdGaleria){

        $i_plus = $i + 1;

        $galeria[$i] = $_FILES["img-{$i_plus}"];
        $hiddenGaleria[$i] = $_POST["hidden-{$i_plus}"];

        $i++;

    }

    $i2 = 0;

    while($i2 <$qtdGaleriaAtual){

        $i2_plus = $i2 + 1;

        $caminhoAtual[$i2] = $_POST["hidden-caminho-{$i2_plus}"]; 

        $i2++;

    }
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $qtd = $_POST["qtd"];
    $estado = $_POST["estado"];
    $variacao = $_POST["variacao"];

    @$novaVariacao = $_POST["novaVariacao"];
    @$textoVariacao = $_POST["texto-variacao"];
    @$opNovaVariacao = $_POST["opNovaVariacao"];

    $categoria = mb_strtolower($_POST["categoria"], "UTF-8");
    $maximo_caracteres = $_POST["maximo_caracteres"];

    if($maximo_caracteres == ""){

        $maximo_caracteres = 'null';

    }

    $promocao = $_POST["promocao"];

    if($promocao == ""){

        $promocao = 'null';

    }

    $tipo = $_POST["tipo"];

    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $largura = $_POST["largura"];
    $comprimento = $_POST["comprimento"];

    $dias_entrega = $_POST["dias-entrega"];

    if($dias_entrega == ""){

        $dias_entrega = 0;

    }

    $classeImg = new produtos();

    $classeImg->id = $idProduto;
    $classeImg->nome = $nome;
    $classeImg->descricao = $descricao;
    $classeImg->preco = $preco;
    $classeImg->qtd = $qtd;
    $classeImg->estado = $estado;
    $classeImg->variacaoPadrao = $variacao;
    $classeImg->maximo_caracteres = $maximo_caracteres;
    $classeImg->promocao = $promocao;
    $classeImg->tipo = $tipo;
    $classeImg->peso = $peso;
    $classeImg->altura = $altura;
    $classeImg->largura = $largura;
    $classeImg->comprimento = $comprimento;
    $classeImg->dias_entrega = $dias_entrega;

    if($novaVariacao != ""){

        $funcVariacao = $classeImg->cadastrar_variacao_personalizada($novaVariacao, $opNovaVariacao, $textoVariacao);

        if($hiddenCapa != 0){

            $classeImg->atualizar_produto(1, $funcVariacao);

        }else{

            $classeImg->atualizar_produto(0, $funcVariacao);
            
        }

    }else{

        if($hiddenCapa != 0){

            $classeImg->atualizar_produto(1, 0);

        }else{

            $classeImg->atualizar_produto(0, 0);
            
        }

    }

    $classeImg->zerar_produtos_categoria();

    $ultimoId = $idProduto;

    $ultimoIdCategoria = $classeImg->retorna_ultimo_id("categoria");

    $classeImg->categoria($categoria, $ultimoIdCategoria, $ultimoId);

    if($hiddenCapa == 0){

        $classeImg->tratar_img($ultimoId, $capa, 1, 1);

        unlink("../img/produtos/$hiddenCaminhoCapa");

    }

    $i_img = 0;

    while($i_img < $qtdGaleria){

        if($hiddenGaleria[$i_img] != 1){

            $classeImg->tratar_img($ultimoId, $galeria[$i_img], $i_img + 2, 2);

        }

        $i_img++;

    }

    $i_img2 = 0;

    while($i_img2 < 9){

        if(@$hiddenGaleria[$i_img2] != 1){

            @$classeImg->apagar_img_galeria_bd($caminhoAtual[$i_img2]);

            @$caminho = $caminhoAtual[$i_img2];

            @unlink("../img/produtos/$caminho");

        }

        $i_img2++;

    }

?>