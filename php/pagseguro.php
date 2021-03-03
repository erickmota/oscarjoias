<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$frete = str_replace(",", ".", $_POST["frete"]);

$classeCompra->idCliente = 1; /* Precisa mudar depois */

foreach($classeCompra->retorna_dados_carrinho() as $arrCarrinho){

    $produto[] = ["nome" => $arrCarrinho["nome_produto"], "preco" => floatval($arrCarrinho["preco"]), "qtd" => $arrCarrinho["qtd_pedido"], "id_produtos" => $arrCarrinho["id_produto"]];

}

@$produto[] = ["nome" => "Frete", "preco" => floatval($frete), "qtd" => "1", "id_produtos" => "0"];

$idCliente = base64_decode($_COOKIE["iu_oj"]);

$dataHoraAtual = date("dmYHis");

$codReferencia = "{$idCliente}{$dataHoraAtual}";

$varcodigo = $classeCompra->pagseguro($produto, $codReferencia);

$i = 0;
$totalCFrete = 0.0;

while($i < count($produto)){

    $precoProdutoQtd = $produto[$i]["preco"] * $produto[$i]["qtd"];

    $totalCFrete += floatval ($precoProdutoQtd);

    $i++;

}

?>

<input type="hidden" id="hiddenCodigo" value="<?php echo $varcodigo; ?>">

<input type="hidden" id="hiddenReferencia" value="<?php echo $codReferencia; ?>">

Total c/frete R$<?php echo number_format($totalCFrete, 2, ",", "."); ?>