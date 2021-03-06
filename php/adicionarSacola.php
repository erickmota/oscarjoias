<?php

    include "../classes/compra.class.php";

    $classeCompra = new compra();

    /* Informações sobre a organização dos dados enviados
    juntamente ao produto
    1 - Nenhum
    2 - Anel único
    3 - Gravação Anel único
    4 - Anel Casal
    5 - Gravação Anel casal
    6 - Apenas Aro
    7 - Apenas Gravação
    8 - Variação complementar
    9 - Quantidade
    10 - Id do produto */

    $anelUnico = $_GET["anelUnico"];
    /* $gravacaoAnelUnico = $_GET["gravacaoAnelUnico"]; */
    $gravacaoAnelUnico = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["gravacaoAnelUnico"]);
    $anelCasal = $_GET["anelCasal"];
    /* $gravacaoAnelCasal = $_GET["gravacaoAnelCasal"]; */
    $gravacaoAnelCasal = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["gravacaoAnelCasal"]);
    $apenasAro = $_GET["apenasAro"];
    /* $apenasGravacao = $_GET["apenasGravacao"]; */
    $apenasGravacao = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_GET["apenasGravacao"]);
    $variacaoComplementar = $_GET["variacaoComplementar"];
    $quantidade = $_GET["quantidade"];
    $idProduto = $_GET["idProduto"];

    /* Verificar existencia usuário */

    if(!isset($classeClientes)){

        include "../classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){

        

    }else{

        die("<script>window.location='../php/deslogar.php'</script>");

    }

    /* //Verificar existencia usuário */

    /* $classeCompra->idCliente = 1; */
    $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["iu_oj"]));
    $classeCompra->anelUnico = $anelUnico;
    $classeCompra->gravacaoAnelUnico = $gravacaoAnelUnico;
    $classeCompra->anelCasal = $anelCasal;
    $classeCompra->gravacaoAnelCasal = $gravacaoAnelCasal;
    $classeCompra->apenasAro = $apenasAro;
    $classeCompra->apenasGravacao = $apenasGravacao;
    $classeCompra->variacaoComplementar = $variacaoComplementar;
    $classeCompra->quantidade = $quantidade;
    $classeCompra->idProduto = $idProduto;

    $classeCompra->adicionar_produto_carrinho();

?>

<script>

    window.location="../sacola";

</script>