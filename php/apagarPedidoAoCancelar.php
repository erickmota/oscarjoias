<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

$idCliente = $_GET["idU"];
$referencia = $_GET["referencia"];

if(isset($_GET["ind"])){

    $retornar = "../pedidos";

}else{

    $retornar = "../sacola";

}

if(isset($_COOKIE["iu_oj"])){

    if($idCliente == base64_decode($_COOKIE["iu_oj"])){

        $classeCompra->idCliente = $idCliente;

        if($classeCompra->verifica_se_referencia_pertence_ao_cliente($referencia) == true){

            $classeCompra->apagar_pedido_e_item_pedido($referencia);

        }
    
    }

}

?>

<script>

    window.location = "<?php echo $retornar; ?>";

</script>