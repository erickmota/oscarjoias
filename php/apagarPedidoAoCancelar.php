<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

/* $idCliente = $_GET["idU"];
$referencia = $_GET["referencia"]; */
$idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["idU"]));
$referencia = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["referencia"]));

if(isset($_GET["ind"])){

    $retornar = "../pedidos";

}else{

    $retornar = "../sacola";

}

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){

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