<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$cep = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["cep"]);

/* 04014 = sedex */
/* 04510 = PAC */

$classeCompra->calcular_frete($cep, "04510");

?>

<div class="col-10 text-center">

    <?php
    
    if($classeCompra->calcular_frete($cep, "04510")[2] == ""){
    
    ?>

    <b>PAC:</b> R$<?php echo $classeCompra->calcular_frete($cep, "04510")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04510")[1]; ?> dias para entrega<br>
    <b>SEDEX:</b> R$<?php echo $classeCompra->calcular_frete($cep, "04014")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04014")[1]; ?> dias para entrega

    <?php
    
    }else{
    
    ?>

    <img class='imgLoading' src='img/loading2.gif' width='200px'><br><p>Calculando</p>

    <?php
    
    }
    
    ?>

</div>