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
$senha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["senha"]);
$novaSenha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["novaSenha"]);
$repetirNovaSenha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["repetirNovaSenha"]);

$classeClientes->emailUsuario = str_replace(array(";", "'", "/", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["eu_oj"]));
$classeClientes->senhaUsuario = $senha;

$verificaUsuario = $classeClientes->verifica_se_senha_e_do_usuario();

if($verificaUsuario == false){

    die("<script>window.alert('A senha atual digitada, está incorreta!'); window.location='../ajustes'</script>");

}

if($novaSenha != $repetirNovaSenha){

    die("<script>window.alert('Os campos nova senha e repetir nova senha não conferem!'); window.location='../ajustes'</script>");

}

$novaSenhaCompactada = base64_encode($novaSenha);

$classeClientes->idUsuario = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["iu_oj"]));

$classeClientes->atualiza_dado_individual_cliente("senha", $novaSenhaCompactada);

$classeClientes->deslogar();

?>

<script>

    window.alert("Sua senha foi alterada com sucesso! Para sua segurança, faça o login novamente.");
    window.location="../";

</script>