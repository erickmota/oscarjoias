<?php

if(!isset($classeCompra)){
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    $classeCompra->idCliente = 1; /* Precisa mudar depois */

}

if(!isset($classeProdutos)){
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();

}

?>

<link rel="stylesheet" href="cssPartes/cabecalho.css">

<div class="row">

    <div class="col bg-danger text-white text-center">

        *Esse site está em desenvolvimento!

    </div>

</div>

<!-- Topo site: Logo, Busca etc -->
<div class="row justify-content-center" id="fundoPreto">

    <div class="col-6 col-md-4 mt-2 mb-3">

        <img src="img/logoOficial2.png" id="imgLogo" width="200px">

    </div>

    <div class="col-6 col-md-5 pb-3">

        <div class="row mt-2">

            <div class="col-2">

                <img id="iconePessoa" src="img/iconePessoa3.png" width="26px">

            </div>

            <div class="col-2">

                <img id="iconeSacola" src="img/iconeBolsa3.png" width="21px">

                <div id="numeroItemSacola" class="text-center"><?php echo $classeCompra->retorna_qtd_itens_carrinho(); ?></div>

            </div>

            <div class="col-8">

                <form>

                    <input type="text" id="campoBusca" placeholder="Buscar Produto">

                </form>

            </div>

        </div>

    </div>

</div>
<!-- //Topo site: Logo, Busca etc -->

<!-- Menu principal -->
<div class="row justify-content-center" id="fundoPretoMenu">

    <div class="col-md-9 text-center">

        <nav id="menu">
            <ul>
                <li><a href="">Início</a></li>

                <li><a href="loja?pg=1">Loja</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">

                        <?php
                        
                        foreach($classeProdutos->retorna_categorias() as $arrCategoria){

                        $catComTraco = str_replace(" ", "-", $arrCategoria["nome"]);
                        $transformarEmMinuscula = mb_strtolower($catComTraco, "UTF-8");
                        $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                        $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                        $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                        $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                        $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                        $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                        $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                        
                        ?>

                        <li><a class="dropdown-item" href="loja?pg=1&cat=<?php echo $str6; ?>&ordenacao=adicionado&tipoord=cre"><?php echo $arrCategoria["nome"]; ?></a></li>

                        <!-- <li><a class="dropdown-item" href="#">Aneis</a></li>
                        <li><a class="dropdown-item" href="#">Alianças</a></li>
                        <li><a class="dropdown-item" href="#">Correntes</a></li>
                        <li><a class="dropdown-item" href="#">Ouro</a></li>
                        <li><a class="dropdown-item" href="#">Prata</a></li> -->

                        <?php
                        
                        }
                        
                        ?>

                    </ul>
                </li>

                <li><a href="#">Quem Somos</a></li>

                <li><a href="#">Contato</a></li>
            </ul>
        </nav>

    </div>

</div>
<!-- //Menu principal -->