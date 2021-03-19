<?php

/* Iniciando classe */
include "../classes/compra.class.php";
$classeCompra = new compra();

$status = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["status"]);
$idPedido = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["id_pedido"]);

$classeCompra->alterar_status_entrega($status, $idPedido);

?>

<script>

    window.location="../adm/pedidos";

</script>