<?php

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

/* $nome = $_POST["nome"]; */
$nome = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome"], ENT_QUOTES, "UTF-8"));

$classeClientes->idUsuario = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_oj"])));

$classeClientes->atualiza_dado_individual_cliente("nome", $nome);

?>

<script>

    window.alert("Seu nome de usuário foi alterado com sucesso!");
    window.location="../ajustes";

</script>