<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$id_categoria = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["id_categoria"]);

if($classeProdutos->retorna_qtd_produtos_por_categoria($id_categoria) > 0){

    die("<script>window.alert('Remova os produtos cadastrados nessa categoria, antes de prosseguir.'); history.back();</script>");

}

$classeProdutos->apagar_categoria($id_categoria);

?>

<script>

    window.location="../adm/configuracoes";

</script>