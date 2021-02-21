<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

@$id_sacola = $_GET["id_sacola"];
@$limpar = $_GET["limpar"];

if(isset($limpar) && $limpar == "sim"){

    $classeCompra->idCliente = 1; /* Precisa mudar depois */

    $classeCompra->limpar_carrinho();

}else{

    $classeCompra->apagar_produto_individual_carrinho($id_sacola);

}

?>

<script>

    window.location="../sacola";

</script>