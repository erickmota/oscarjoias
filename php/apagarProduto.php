<?php

include "../classes/produtos.class.php";

$classeProdutos = new produtos();

$idProduto = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["id_produto"]);

$classeProdutos->id = $idProduto;

$funcVerificaPedido = $classeProdutos->verificar_se_existe_pedido_para_o_produto();

if($funcVerificaPedido == true){

    die("<script>window.alert('Existem um ou mais pedidos associados a esse produto, por esse motivo, não é permitido a exclusão do mesmo. Recomendamos que altere o estado do produto para rascunho!'); history.back();</script>");

}

foreach($classeProdutos->retorna_dados_produto_pelo_id() as $arrProduto){

    $capa = $arrProduto["foto"];

}

foreach($classeProdutos->retorna_dados_galeria()["dados"] as $arrGaleria){

    $caminho = $arrGaleria["caminho"];

    unlink("../img/produtos/$caminho");

}

unlink("../img/produtos/$capa");

$classeProdutos->apagar_produto();

?>

<script>

    window.alert("Produto apagado com sucesso!");
    window.location="../adm/produtos-cadastrados";

</script>