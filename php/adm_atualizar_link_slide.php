<?php

include "../classes/adm.class.php";
$classeAdm = new adm();

$link = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["link"]);
$posicao = $_POST["hiddenLink"];

$classeAdm->atualizar_link_slide($posicao, $link);

?>

<script>

    window.alert("Link atualizado com sucesso!");
    window.location="../adm/configuracoes";

</script>