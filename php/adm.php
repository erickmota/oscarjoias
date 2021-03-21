<?php

    include "../classes/produtos.class.php";

    /* Verificando existencia do ADM */

    if(!isset($classeAdm)){

        include "../classes/adm.class.php";
        $classeAdm = new adm();

    }

    if(isset($_COOKIE["aiu_oj"]) && isset($_COOKIE["aeu_oj"]) && isset($_COOKIE["asu_oj"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_oj"], $_COOKIE["aeu_oj"], $_COOKIE["asu_oj"]) == true){

        

    }else{

        die("<script>window.location='../php/adm_deslogar.php'</script>");

    }

    /* // Verificando existencia do ADM */

    /* $qtdGaleria = 3;
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
    $tipo = $_POST["tipo"]; */

    $qtdGaleria = $_POST["qtd-galeria"];

    if($qtdGaleria == ""){

        $qtdGaleria = 0;

    }

    $nome = $_POST["nome"];
    $capa = $_FILES["capa"];

    $i = 0;

    while($i < $qtdGaleria){

        $i_plus = $i + 1;

        $galeria[$i] = $_FILES["img-{$i_plus}"];

        $i++;

    }

    /* $galeria[1] = $_FILES["galeria1"];
    $galeria[2] = $_FILES["galeria2"];
    $galeria[3] = $_FILES["galeria3"]; */
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

    /* echo "{$maximo_caracteres} {$promocao} {$dias_entrega}"; */

    $classeImg = new produtos();

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

        $classeImg->cadastrar_produto_bd($funcVariacao);

    }else{

        $classeImg->cadastrar_produto_bd(0);

    }

    $ultimoId = $classeImg->retorna_ultimo_id("produtos");

    $ultimoIdCategoria = $classeImg->retorna_ultimo_id("categoria");

    $classeImg->categoria($categoria, $ultimoIdCategoria, $ultimoId);

    $classeImg->tratar_img($ultimoId, $capa, 1, 1);

    $i_img = 0;

    while($i_img < $qtdGaleria){

        $classeImg->tratar_img($ultimoId, $galeria[$i_img], $i_img + 2, 2);

        $i_img++;

    }

    $classeAdm->sitemap("../sitemap.xml");

?>

<script>

    window.alert("Produto cadastrado com sucesso!");
    window.location="../adm/novo-produto";

</script>