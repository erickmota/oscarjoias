<?php

$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$bairro = $_POST["bairro"];
$rua = $_POST["rua"];
$complemento = $_POST["complemento"];
$numero = $_POST["numero"];
$referenciaPS = $_POST["referencia"];
$cep = $_POST["cep"];

include "../classes/compra.class.php";
$classeCompra = new compra();

$classeCompra->idCliente = base64_decode($_COOKIE["iu_oj"]);

$dataHora = date("Y-m-d H:i:s");

$classeCompra->adicionar_nova_compra($referenciaPS, $cidade, $estado, $bairro, $rua, $complemento, $numero, $cep, $dataHora, "Em processamento");

/* echo "{$referenciaPS}, {$cidade}, {$estado}, {$bairro}, {$rua}, {$complemento}, {$numero}, {$cep}"; */

?>