<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome_categoria = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["nome"]);

$funcCategoria = $classeProdutos->adicionar_categoria_adm($nome_categoria);

if($funcCategoria == true){

    echo "<script>window.location='../adm/configuracoes'</script>";

}else{

    echo "<script>window.alert('Essa categoria já existe!'); window.location='../adm/configuracoes'</script>";

}

?>