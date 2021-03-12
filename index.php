<?php

/* Iniciando classe */
include "classes/verificarExistencia.class.php";
$classeVerificar = new verificarExistencia();

if(isset($_GET["url"])){

  $explode = explode("/", $_GET["url"]);

  if($explode[0] == "loja"){

    include "paginas/loja.php";

  }else if($explode[0] == "produto"){

    if(isset($explode[1])){

      $classeVerificar->tabela = "produtos";
      $classeVerificar->comparador = "nome";

      $nomeComTraco = str_replace(" ", "-", $explode[1]);
      $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
      $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
      $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
      $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
      $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
      $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
      $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
      $str6 = preg_replace('/[ç]/ui', 'c', $str5);
      $classeVerificar->comparar = $str6;

      if($classeVerificar->verificarExisenciaProduto() == true){

        include "paginas/produto.php";

      }else{



      }

    }else{

      include "paginas/loja.php";
      
    }

  }else if($explode[0] == "adm"){

    if(isset($explode[1])){

      if($explode[1] == "novo-produto"){

        include "paginas/adm_novo_produto.php";

      }

    }else{

      include "paginas/adm.php";

    }

  }else if($explode[0] == "sacola"){

    include "paginas/sacola.php";

  }else if($explode[0] == "login"){

    include "paginas/login.php";

  }else if($explode[0] == "pedidos"){

    include "paginas/pedidos.php";

  }else if($explode[0] == "detalhe-pedido"){

    include "paginas/itemPedido.php";

  }else if($explode[0] == "aviso-confirmar"){

    include "paginas/aviso_confirmar.php";

  }else if($explode[0] == "confirmacao-email"){

    include "paginas/confirmacao_cadastro.php";

  }else if($explode[0] == "quem-somos"){

    include "paginas/quem_somos.php";

  }else if($explode[0] == "contato"){

    include "paginas/contato.php";

  }else if($explode[0] == "ajustes"){

    include "paginas/ajustes.php";

  }

}else{

  include "paginas/home.php";

}

?>