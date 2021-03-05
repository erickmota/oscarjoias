<?php

class email{

    public function confirmarcao_cadastro_cliente($emailDestino, $assunto){

        $emailOrigem = "contato@oscarjoias.com";

        $emailCompactado = base64_encode($emailDestino);

        $corpo = "<h1>Oscar Jóias</h1>"
        ."<p>Obrigado por se cadstrar no Oscar Jóias, toda a equipe deseja boas compras!<br>"
        ."Por favor, clique no link abaixo para confirmar seu cadastro, caso você não seja responsável pelo cadastro, favor desconsiderar.</p>"
        ."<p><a href='http://lojaoscar.erickmota.com/confirmacao-email?e={$emailCompactado}'>http://lojaoscar.erickmota.com/confirmacao-email?e={$emailCompactado}</a></p>";

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $emailOrigem\n";

        @mail ($emailDestino,  $assunto, $corpo, $header);

    }

}

?>