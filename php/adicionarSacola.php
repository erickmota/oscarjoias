<?php

    include "../classes/compra.class.php";

    $classeCompra = new compra();

    /* $anelUnico = htmlentities($_GET["anelUnico"]); */
    $anelUnico = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["anelUnico"], ENT_QUOTES, "UTF-8"));
    $gravacaoAnelUnico = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["gravacaoAnelUnico"], ENT_QUOTES, "UTF-8"));
    /* $anelCasal = htmlentities($_GET["anelCasal"]); */
    $anelCasal = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["anelCasal"], ENT_QUOTES, "UTF-8"));
    $gravacaoAnelCasal = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["gravacaoAnelCasal"], ENT_QUOTES, "UTF-8"));
    /* $apenasAro = htmlentities($_GET["apenasAro"]); */
    $apenasAro = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["apenasAro"], ENT_QUOTES, "UTF-8"));
    $apenasGravacao = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["apenasGravacao"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar = htmlentities($_GET["variacaoComplementar"]); */
    $variacaoComplementar = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar2 = htmlentities($_GET["variacaoComplementar2"]); */
    $variacaoComplementar2 = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar2"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar3 = htmlentities($_GET["variacaoComplementar3"]); */
    $variacaoComplementar3 = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar3"], ENT_QUOTES, "UTF-8"));
    /* $quantidade = htmlentities($_GET["quantidade"]); */
    $quantidade = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["quantidade"], ENT_QUOTES, "UTF-8"));
    /* $idProduto = htmlentities($_GET["idProduto"]); */
    $idProduto = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["idProduto"], ENT_QUOTES, "UTF-8"));


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