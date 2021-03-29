<?php

include "../classes/email.class.php";
$classeEmail = new email();

include "../classes/clientes.class.php";
$classeClientes = new clientes();

/* $email = $_POST["esqueci-email"]; */
$email = str_replace(array(";", "'", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["esqueci-email"]));

$classeClientes->emailUsuario = $email;

$dadosUsuario = $classeClientes->retornar_senha_por_email();

if($dadosUsuario == false){

    die("<script>window.alert('E-mail não cadastrado em nossa base de dados!'); window.location='../'</script>");

}

$senhaDescompactada = base64_decode($dadosUsuario["senha"]);

$classeEmail->lembrar_senha($email, $dadosUsuario["nome"], $senhaDescompactada);

?>

<script>

    window.alert("Por favor, verifique sua caixa de entrada e sua caixa de spans!");
    window.location="../";

</script>