<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$cep = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["cep"]);
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$largura = $_POST["largura"];
$comprimento = $_POST["comprimento"];

/* 04014 = sedex */
/* 04510 = PAC */

/* $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04510"); */

$calcular04510 = $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04510");
$calcular04014 = $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04014");

?>

<div class="col text-center">

    <?php
    
    if($calcular04510[2] == ""){

        /* Primeiro numero do CEP de Sorocaba e último número do CEP de Votorantim */
        if($cep > "18000001" && $cep < "18119999"){

        ?>

            <select id="selectFrete" class="text-secondary" onchange="retorna_codigo_pagseguro(this.value)">

            <option disabled selected hidden value="vazio">Selecione o tipo de entrega</option>
            <option value="GRATIS-0.00">Frete Grátis - <?php echo $calcular04510[1]; ?> dias para entrega</option>

            </select>

            <br><br><b>FRETE GRÁTIS</b> - <?php echo $calcular04510[1]; ?> dias úteis para entrega

        <?php

        }else{

        ?>

            <select id="selectFrete" class="text-secondary" onchange="retorna_codigo_pagseguro(this.value)">

            <option disabled selected hidden value="vazio">Selecione o tipo de entrega</option>
            <option value="PAC-<?php echo $calcular04510[0]; ?>">PAC: R$<?php echo $calcular04510[0]; ?> - <?php echo $calcular04510[1]; ?> dias para entrega</option>
            <option value="SEDEX-<?php echo $calcular04014[0]; ?>">SEDEX: R$<?php echo $calcular04014[0]; ?> - <?php echo $calcular04014[1]; ?> dias para entrega</option>

            </select>

            <br><br><b>PAC:</b> R$<?php echo $calcular04510[0]; ?> - <?php echo $calcular04510[1]; ?> dias para entrega<br>
            <b>SEDEX:</b> R$<?php echo $calcular04014[0]; ?> - <?php echo $calcular04014[1]; ?> dias para entrega

        <?php

        }
    
    }else{
    
    ?>

    <span class="text-black-50"><?php echo $calcular04510[2]; ?></span><br><br>
    <span class="text-info">Problemas para calcular o frete? contato@oscarjoias.com</span>

    <?php
    
    }
    
    ?>

</div>