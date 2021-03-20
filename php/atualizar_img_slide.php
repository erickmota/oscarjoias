<?php

include "../classes/adm.class.php";
$classeAdm = new adm;

$img = $_FILES["img"];
$posicao = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["hiddenFoto"]);

$funcImg = $classeAdm->trocar_slide($posicao, $img);

if($funcImg == true){

    echo "<script>window.alert('Slide atualizado com sucesso!'); window.location='../adm/configuracoes'</script>";

}else{

    echo "<script>window.alert('Verifique o formato da imagem, ela precisa ser JPG'); history.back();</script>";

}

?>