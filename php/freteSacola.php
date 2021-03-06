<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$cep = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["cep"]);

/* 04014 = sedex */
/* 04510 = PAC */

$classeCompra->calcular_frete($cep, "04510");

?>

<div class="col text-center">

    <?php
    
    if($classeCompra->calcular_frete($cep, "04510")[2] == ""){
    
    ?>

    <select id="selectFrete" class="text-secondary" onchange="retorna_codigo_pagseguro(this.value)">

    <option disabled selected hidden value="vazio">Selecione o tipo de entrega</option>
    <option value="<?php echo $classeCompra->calcular_frete($cep, "04510")[0]; ?>">PAC: R$<?php echo $classeCompra->calcular_frete($cep, "04510")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04510")[1]; ?> dias para entrega</option>
    <option value="<?php echo $classeCompra->calcular_frete($cep, "04014")[0]; ?>">SEDEX: R$<?php echo $classeCompra->calcular_frete($cep, "04014")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04014")[1]; ?> dias para entrega</option>

    </select>

    <br><br><b>PAC:</b> R$<?php echo $classeCompra->calcular_frete($cep, "04510")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04510")[1]; ?> dias para entrega<br>
    <b>SEDEX:</b> R$<?php echo $classeCompra->calcular_frete($cep, "04014")[0]; ?> - <?php echo $classeCompra->calcular_frete($cep, "04014")[1]; ?> dias para entrega

    <?php
    
    }else{
    
    ?>

    <span>Calculando...</span>

    <?php
    
    }
    
    ?>

</div>