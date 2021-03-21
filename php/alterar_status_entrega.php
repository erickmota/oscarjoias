<?php

/* Iniciando classe */
include "../classes/compra.class.php";
$classeCompra = new compra();

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

$status = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["status"]);
$idPedido = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["id_pedido"]);

$classeCompra->alterar_status_entrega($status, $idPedido);

?>

<script>

    window.location="../adm/pedidos";

</script>