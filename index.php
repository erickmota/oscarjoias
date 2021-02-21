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
      $convert = iconv('utf-8', 'us-ascii//TRANSLIT', $transformarEmMinuscula);
      $classeVerificar->comparar = $convert;

      if($classeVerificar->verificarExisenciaProduto() == true){

        include "paginas/produto.php";

      }else{



      }

    }else{

      include "paginas/loja.php";
      
    }

  }else if($explode[0] == "adm"){

    include "paginas/adm.php";

  }else if($explode[0] == "sacola"){

    include "paginas/sacola.php";

  }

}else{

  include "paginas/home.php";

}

?>