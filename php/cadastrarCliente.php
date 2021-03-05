<?php

include "../classes/clientes.class.php";
$classeclientes = new clientes;

$nome = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["nome"]);
$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["email"]);
$senha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["senha"]);
$confirmarSenha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["confirmarSenha"]);

$classeclientes->emailUsuario = $email;

$verificaEmail = $classeclientes->verifica_existencia_email();

if($verificaEmail > 0){

    die("E-mail já existe na base de dados!");

}

if($senha != $confirmarSenha){

    die("Senha e confirmar senha são diferentes!");

}

$classeclientes->nomeUsuario = $nome;
$classeclientes->senhaUsuario = $senha;

$classeclientes->cadastrar("pendente");

header("Location: ../aviso-confirmar?e={$email}");

?>