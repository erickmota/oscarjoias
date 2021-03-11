<?php

include "../classes/email.class.php";
$classeEmail = new email();

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$texto = $_POST["texto"];

$classeEmail->contato($email, $nome, $assunto, $texto);

?>

<script>

    window.alert("Obrigado, iremos responder seu e-mail o mais breve possível!");
    window.location="../contato";

</script>