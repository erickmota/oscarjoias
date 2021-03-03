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

if(!isset($classeClientes)){
    
    /* Iniciando classe */
    include "classes/clientes.class.php";
    $classeClientes = new clientes();

}

?>

<link rel="stylesheet" href="cssPartes/cabecalho.css">

<script>

    $(function () {
        $('#iconePessoa').popover({
        html: true,
        content: function() {
                return $('#menu-pessoa').html();
            }
        })
    })

    function trocar_logar_cadastrar(modo){

        var corpoModalLogar = document.getElementById("corpoModalLogar");
        var corpoModalCadastrar = document.getElementById("corpoModalCadastrar");

        if(modo == 1){

            $(function(){

                $( "#corpoModalLogar2" ).slideUp(300);
                $( "#corpoModalCadastrar2" ).slideDown(300);

            })

        }else{

            $(function(){

                $( "#corpoModalLogar2" ).slideDown(300);
                $( "#corpoModalCadastrar2" ).slideUp(300);

            })

        }

    }
    
    </script>

<div class="row">

    <div class="col bg-danger text-white text-center">

        *Esse site está em desenvolvimento!

    </div>

</div>

<!-- Topo site: Logo, Busca etc -->
<div class="row justify-content-center" id="fundoPreto">

    <div class="col-6 col-md-4 mt-2 mb-3">

        <img src="img/logo.png" id="imgLogo" width="200px">

    </div>

    <div class="col-6 col-md-5 pb-3">

        <div class="row mt-2">

            <div class="col-2">

                <?php
                
                if(!isset($_COOKIE["iu_oj"]) && !isset($_COOKIE["eu_oj"]) && !isset($_COOKIE["su_oj"])){
                
                ?>

                <img id="iconePessoa" src="img/iconePessoa3.png" width="26px" data-bs-toggle="modal" data-bs-target="#exampleModal">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark" id="espacoModal">

                        <div id="corpoModalLogar" class="modal-body">

                            <div id="corpoModalLogar2">

                            <div class="row justify-content-center">

                                <div class="col-8 text-center">

                                    <img src="img/logo.png" width="150px">

                                </div>

                            </div>
                            
                            <div class="row justify-content-center mt-4">

                                <div class="col-10 col-sm-7">

                                    <form method="POST" action="php/login.php">

                                    <input type="email" class="form-control" placeholder="E-mail" name="email">

                                </div>

                            </div>

                            <div class="row justify-content-center">

                                <div class="col-10 col-sm-7">

                                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                                    <input type="hidden" value="<?php echo $_SERVER["REQUEST_URI"] ?>" name="url">

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <input type="submit" class="form-control" value="ENTRAR" id="botaoEntrar">

                                    </form>

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7 text-white text-center">

                                    Ou

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <button onclick="trocar_logar_cadastrar(1)" type="button" class="form-control btn btn-secondary btn-sm">CRIAR CONTA</button>

                                </div>

                            </div>

                        </div>

                        </div>

                        <div id="corpoModalCadastrar" class="modal-body">

                            <div id="corpoModalCadastrar2" style="display: none;">

                            <div class="row justify-content-center">

                                <div class="col-8 text-center">

                                    <img src="img/logo.png" width="150px">

                                </div>

                            </div>
                            
                            <div class="row justify-content-center mt-4">

                                <div class="col-10 col-sm-7">

                                    <input type="text" class="form-control" placeholder="Seu nome">
                                    <small class="text-white">Como gostaria de ser chamado(a)?</small>

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <input type="email" class="form-control" placeholder="Seu-email">
                                    <small class="text-white">Use o seu melhor e-mail</small>

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <input type="password" class="form-control" placeholder="Sua senha">

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <input type="password" class="form-control" placeholder="Confirme a senha">
                                    <small class="text-white">Dica: use letras e números; não use uma senha muito óbvia</small>

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <input type="submit" class="form-control" value="CADASTRAR" id="botaoEntrar">

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7 text-white text-center">

                                    Ou

                                </div>

                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-10 col-sm-7">

                                    <button onclick="trocar_logar_cadastrar(2)" type="button" class="form-control btn btn-secondary btn-sm">VOLTAR AO LOGIN</button>

                                </div>

                            </div>

                        </div>

                        </div>

                    </div>
                    </div>
                </div>

                <?php
                
                }else if(isset($_COOKIE["iu_oj"]) && isset($_COOKIE["eu_oj"]) && isset($_COOKIE["su_oj"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_oj"], $_COOKIE["eu_oj"], $_COOKIE["su_oj"]) == true){
                
                ?>

                <img id="iconePessoa" src="img/iconePessoa3.png" width="26px" data-toggle="popover" data-bs-placement="bottom" title="Bem Vindo Erick Mota">

                <div id="menu-pessoa" class="text-center bg-dark" style="display: none">

                    <a href="pedidos" class="text-decoration-none text-secondary"><p class="border-bottom pb-3 pt-3 pr-3 pl-3"><img id="iconesPessoa" src="img/check.png" width="25px"> Meus Pedidos</p></a>
                    <a href="#" class="text-decoration-none text-secondary"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesPessoa" src="img/config.png" height="20px"> Ajustes</p></a>
                    <a href="php/deslogar.php" class="text-decoration-none text-secondary"><p class="pr-3 pl-3"><img id="iconesPessoa" src="img/sair.png" width="25px"> Sair</p></a>

                    <!-- <ul id="listaPessoa" class="text-center">
                    
                        <li class="border-bottom pb-3 pt-3 pr-3 pl-3"><img id="iconesPessoa" src="img/check.png" width="25px"> Meus Pedidos</li>
                        <li class="pr-3 pl-3 mt-3"><img id="iconesPessoa" src="img/sair.png" width="25px"> Sair</li>
                    
                    </ul> -->
            
                </div>

                <?php
                
                }
                
                ?>

            </div>

            <div class="col-2">

                <img onclick="window.location='sacola'" id="iconeSacola" src="img/iconeBolsa3.png" width="21px">

                <div onclick="window.location='sacola'" id="numeroItemSacola" class="text-center"><?php echo $classeCompra->retorna_qtd_itens_carrinho(); ?></div>

            </div>

            <div class="col-8">

                <form action="loja" method="GET">

                    <input type="text" id="campoBusca" placeholder="Buscar Produto" name="busca">

                    <input type="hidden" name="pg" value="1">
                    <input type="hidden" name="ordenacao" value="adicionado">
                    <input type="hidden" name="tipoord" value="cre">

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