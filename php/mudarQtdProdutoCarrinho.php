<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

$id_sacola = $_GET["id_sacola"];
$nova_qtd = $_GET["nova_qtd"];

$classeCompra->atualiza_qtd_produto_carrinho($id_sacola, $nova_qtd);

?>

<script>

    window.location="../sacola";

</script>