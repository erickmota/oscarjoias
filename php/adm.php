<?php

    include "../classes/produtos.class.php";

    $qtdGaleria = 3;
    $nome = $_POST["nome"];
    $capa = $_FILES["capa"];
    $galeria[1] = $_FILES["galeria1"];
    $galeria[2] = $_FILES["galeria2"];
    $galeria[3] = $_FILES["galeria3"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $qtd = $_POST["qtd"];
    $estado = $_POST["estado"];
    $variacao = $_POST["variacao"];
    $novaVariacao = $_POST["novaVariacao"];
    $opNovaVariacao = $_POST["opNovaVariacao"];
    $categoria = $_POST["categoria"];
    $maximo_caracteres = $_POST["maximo_caracteres"];
    $promocao = $_POST["promocao"];

    $classeImg = new produtos();

    $classeImg->nome = $nome;
    $classeImg->descricao = $descricao;
    $classeImg->preco = $preco;
    $classeImg->qtd = $qtd;
    $classeImg->estado = $estado;
    $classeImg->variacaoPadrao = $variacao;
    $classeImg->maximo_caracteres = $maximo_caracteres;
    $classeImg->promocao = $promocao;

    if($novaVariacao != ""){

        $classeImg->cadastrar_variacao_personalizada($novaVariacao, $opNovaVariacao);

        $ultimoIdVariacao = $classeImg->retorna_ultimo_id("variacao_produtos");

        $classeImg->cadastrar_produto_bd($ultimoIdVariacao);

    }else{

        $classeImg->cadastrar_produto_bd(0);

    }

    $ultimoId = $classeImg->retorna_ultimo_id("produtos");

    $ultimoIdCategoria = $classeImg->retorna_ultimo_id("categoria");

    $classeImg->categoria($categoria, $ultimoIdCategoria, $ultimoId);

    $classeImg->tratar_img($ultimoId, $capa, 1, 1);

    $i_img = 1;

    while($i_img <= $qtdGaleria){

        $classeImg->tratar_img($ultimoId, $galeria[$i_img], $i_img + 1, 2);

        $i_img++;

    }

?>