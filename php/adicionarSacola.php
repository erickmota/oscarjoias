<?php

    include "../classes/compra.class.php";

    $classeCompra = new compra();

    $anelUnico = htmlentities($_GET["anelUnico"]);
    $gravacaoAnelUnico = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["gravacaoAnelUnico"]));
    $anelCasal = htmlentities($_GET["anelCasal"]);
    $gravacaoAnelCasal = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["gravacaoAnelCasal"]));
    $apenasAro = htmlentities($_GET["apenasAro"]);
    $apenasGravacao = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["apenasGravacao"]));
    $variacaoComplementar = htmlentities($_GET["variacaoComplementar"]);
    $variacaoComplementar2 = htmlentities($_GET["variacaoComplementar2"]);
    $variacaoComplementar3 = htmlentities($_GET["variacaoComplementar3"]);
    $quantidade = htmlentities($_GET["quantidade"]);
    $idProduto = htmlentities($_GET["idProduto"]);


    if(!isset($classeClientes)){

        include "../classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){

        

    }else{

        die("<script>window.location='../php/deslogar.php'</script>");

    }
    
    $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_oj"])));
    $classeCompra->anelUnico = $anelUnico;
    $classeCompra->gravacaoAnelUnico = $gravacaoAnelUnico;
    $classeCompra->anelCasal = $anelCasal;
    $classeCompra->gravacaoAnelCasal = $gravacaoAnelCasal;
    $classeCompra->apenasAro = $apenasAro;
    $classeCompra->apenasGravacao = $apenasGravacao;
    $classeCompra->variacaoComplementar = $variacaoComplementar;
    $classeCompra->variacaoComplementar2 = $variacaoComplementar2;
    $classeCompra->variacaoComplementar3 = $variacaoComplementar3;
    $classeCompra->quantidade = $quantidade;
    $classeCompra->idProduto = $idProduto;

    $classeCompra->adicionar_produto_carrinho();

?>

<script>

    window.location="../sacola";

</script>