<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

@$id_sacola = $_GET["id_sacola"];
@$limpar = $_GET["limpar"];

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){

    if(isset($limpar)){



    }else{

        if($classeClientes->verifica_se_sacola_pertence_ao_cliente($id_sacola, base64_decode($_COOKIE["iu_oj"])) > 0){



        }else{
    
            die("<script>window.location='../php/deslogar.php'</script>");
    
        }

    }

}else{

    die("<script>window.location='../php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

if(isset($limpar) && $limpar == "sim"){

    $classeCompra->idCliente = base64_decode($_COOKIE["iu_oj"]);

    $classeCompra->limpar_carrinho();

}else{

    $classeCompra->apagar_produto_individual_carrinho($id_sacola);

}

?>

<script>

    window.location="../sacola";

</script>