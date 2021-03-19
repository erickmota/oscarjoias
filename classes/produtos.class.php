<?php

class produtos{

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $qtd;
    public $estado;
    public $variacaoPadrao;
    public $maximo_caracteres;
    public $promocao;
    public $tipo;
    public $peso;
    public $altura;
    public $largura;
    public $comprimento;
    public $dias_entrega;

    /* Tratar imagem do produto e enviar a pasta de destino */
    public function tratar_img($id_produto, $img, $ordemEnvio, $capaGaleria){

        include 'conexao.class.php';

        $pasta = "../img/produtos/";

        $dataHoraAtual = date("dmYHis");

        move_uploaded_file($img["tmp_name"], $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg");

        $orgFile =  $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";
        
        list($largura, $altura) = getimagesize($orgFile);

        $novaImg = imagecreatefromjpeg($orgFile);

        if($largura >= 1500){
            
            $novaLargura = $largura*0.25;
            $novaAltura = $altura*0.25;
            
        }elseif($largura < 1500 && $largura > 1000){
            
            $novaLargura = $largura*0.50;
            $novaAltura = $altura*0.50;
            
        }else{
            
            $novaLargura = $largura*0.75;
            $novaAltura = $altura*0.75;
            
        }

        $trucolor = imagecreatetruecolor($novaLargura, $novaAltura);

        $novaI = imagecopyresampled($trucolor, $novaImg, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

        $nova = imagejpeg($trucolor, $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg", 80);

        $novoNome = $ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";

        if($capaGaleria == 1){

            $sql = mysqli_query($conn, "UPDATE produtos SET foto='$novoNome' WHERE id=$id_produto") or die ("Erro ao Upar a imagem de capa");

        }else{

            $sql = mysqli_query($conn, "INSERT INTO galeria (id_produtos, caminho) VALUES ($id_produto, '$novoNome')") or die("Erro ao mandar galeria ao BD");

        }

    }

    /* Enviar produto para o BD */
    public function cadastrar_produto_bd($variacaoAdicional){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO produtos (nome, foto, descricao, preco, qtd_estoque, estado, id_variacao_produto, variacao_padrao, qtd_caracteres, preco_promocao, tipo, peso, altura, largura, comprimento, dias_entrega) VALUES ('$this->nome', NULL, '$this->descricao', $this->preco, $this->qtd, '$this->estado', $variacaoAdicional, '$this->variacaoPadrao', $this->maximo_caracteres, $this->promocao, '$this->tipo', '$this->peso', '$this->altura', '$this->largura', '$this->comprimento', $this->dias_entrega)") or die("Erro ao cadastrar o produto");

    }

    /* Retorna ultimo id de uma tabela */
    public function retorna_ultimo_id($tabela){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM $tabela ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
        $linha = mysqli_fetch_array($sql);

        return $linha["id"];

    }

    /* Cadastrar variações adicionais */
    public function cadastrar_variacao_personalizada($nomeVariacao, $opVariacao, $texto_cliente){

        include 'conexao.class.php';

        $sql1 = mysqli_query($conn, "SELECT id FROM variacao_produtos WHERE nome='$nomeVariacao'") or die("Erro verificar se existe variação personalizada");
        $qtd1 = mysqli_num_rows($sql1);
        $linha1 = mysqli_fetch_assoc($sql1);

        if($qtd1 < 1){

            $tirarEspacos = str_replace(", ", ",", $opVariacao);
            $tirarEspacos2 = str_replace(", ", ",", $tirarEspacos);

            $sql = mysqli_query($conn, "INSERT INTO variacao_produtos (nome, opcoes, texto_cliente) VALUES ('$nomeVariacao', '$tirarEspacos2', '$texto_cliente')") or die("Erro variação personalizada");

            $sql2 = mysqli_query($conn, "SELECT id FROM variacao_produtos ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
            $linha2 = mysqli_fetch_array($sql2);

            return $linha2["id"];

        }else{

            return $linha1["id"];

        }

    }

    /* Cadastrar categorias */
    public function categoria($categoria, $ultimoIdCategoria, $ultimoIdProduto){

        include 'conexao.class.php';

        $tirarEspacos = str_replace(", ", ",", $categoria);
        $tirarEspacos2 = str_replace(", ", ",", $tirarEspacos);
        $transformarEmMinuscula = mb_strtolower($tirarEspacos2, "UTF-8");

        $categoriaIndividual = explode(",", $transformarEmMinuscula);
        $qtdCategoria = count($categoriaIndividual);

        $i = 0;

        while($i < $qtdCategoria){

            $sql = mysqli_query($conn, "SELECT id FROM categoria WHERE nome='$categoriaIndividual[$i]'") or die("Erro nome categoria");
            $qtdResultado = mysqli_num_rows($sql);

            if($qtdResultado < 1){

                $sql2 = mysqli_query($conn, "INSERT INTO categoria (id, nome) VALUES ($ultimoIdCategoria + ($i + 1), '$categoriaIndividual[$i]')") or die("Erro adicionar categoria");

                $sql3 = mysqli_query($conn, "INSERT INTO categoria_produto (id_categoria, id_produtos) VALUES ($ultimoIdCategoria + ($i + 1), $ultimoIdProduto)") or die("Erro ao relacionar produtos x categoria");

            }else{

                $linhaCategoriaSelecionada = mysqli_fetch_array($sql);
                $idCategoriaSelecionada = $linhaCategoriaSelecionada["id"];

                $sql2 = mysqli_query($conn, "INSERT INTO categoria_produto (id_categoria, id_produtos) VALUES ($idCategoriaSelecionada, $ultimoIdProduto)") or die("Erro buscar id Categoria");

            }

            $i++;

        }

    }

    /* Retorna Dados do produto pelo nome */
    public function retorna_dados_pelo_nome(){

        include 'conexao.class.php';

        $nomeSemTraco = str_replace("-", " ", $this->nome);

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome='$nomeSemTraco' collate utf8_general_ci") or die("Erro retornar dados produto");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    /* Retorna as opções das variações */
    public function retorna_opcoes_variacoes($idVariacao){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM variacao_produtos WHERE id=$idVariacao") or die("Erro retorna op variações");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    /* Formata as opções das variações */
    public function formatar_op_variacoes($opVariacao){

        $opIndividual = explode(",", $opVariacao);

        return $opIndividual;

    }

    /* Retornar Imagens da galeria */
    public function retorna_img_galeria($idProduto){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM galeria INNER JOIN produtos ON galeria.id_produtos=produtos.id WHERE produtos.id=$idProduto ORDER BY galeria.caminho ASC") or die("Erro retornar galeria");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        if($qtd < 1){

            return false;

        }else{

            return $array;

        }

    }

    /* Retorna lista de produtos para a loja */
    public function retorna_lsita_produtos($tipo, $vMinimo, $vMaximo, $categoria, $pg, $ordenacao, $tipoOrdenacao, $busca){

        include 'conexao.class.php';

        $somaPg = ($pg * 12) - 12;

        if($categoria != "SE"){

            $catSemTraco = str_replace("-", " ", $categoria);

            $sql3 = mysqli_query($conn, "SELECT * FROM categoria WHERE nome='$catSemTraco' collate utf8_general_ci") or die("Erro ao retornar dados categoria");
            $linha3 = mysqli_fetch_array($sql3);

            $id_categoria = $linha3["id"];

            /* $sql4 = mysqli_query($conn, "SELECT * FROM categoria_produtos INNER JOIN produtos ON categoria_produtos.id_produtos=produtos.id") or die("Erro ao retornar dados categoria"); */

            if($tipo != "SE" && $vMinimo == "SE"){

                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja tipo"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.tipo='$tipo' AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja cat");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.tipo='$tipo' AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao") or die("Erro ao retornar dados categoria cat2");

            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo == "SE"){
    
                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja VM");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja cat");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao") or die("Erro ao retornar dados categoria cat2");

            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo != "SE"){
    
                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja VM + Tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM + Tipo"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.tipo='$tipo' AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja cat");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.tipo='$tipo' AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao") or die("Erro ao retornar dados categoria cat2");

            }else{
    
                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja cat");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordenacao $tipoOrdenacao") or die("Erro ao retornar dados categoria cat2");

            }

        }else if($busca != "SE"){

            if($tipo != "SE" && $vMinimo == "SE"){

                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja tipo"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND tipo='$tipo' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND tipo='$tipo' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja");

            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo == "SE"){
    
                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja VM");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja");

            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo != "SE"){
    
                /* $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 3") or die("Erro retornar produtos para a loja VM + Tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM + Tipo"); */
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja");

            }else{
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja");
    
            }

        }else{

            if($tipo != "SE" && $vMinimo == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja tipo");
    
            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo == "SE"){
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja VM");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM");
    
            }else if($vMinimo != "SE" && $vMaximo != "SE" && $tipo != "SE"){
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja VM + Tipo");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo='$tipo' AND preco BETWEEN $vMinimo AND $vMaximo AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja VM + Tipo");
    
            }else{
    
                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao LIMIT $somaPg, 12") or die("Erro retornar produtos para a loja");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY $ordenacao $tipoOrdenacao") or die("Erro retornar produtos para a loja");
    
            }

        }

        $qtd_sql = mysqli_num_rows($sql);
        $qtd_sql2 = mysqli_num_rows($sql2);
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        if($qtd_sql < 1){

            $retorno = [false, $qtd_sql, $qtd_sql2];

        }else{

            $retorno = [$array, $qtd_sql, $qtd_sql2];

        }

        return $retorno;

    }

    public function retorna_lista_produtos_home($qtd){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY id DESC LIMIT $qtd") or die("Erro retornar produtos para a loja");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function organizar_paginacao($qtdTotalItens, $pgAtual){

        $paginaLimite = $qtdTotalItens / 12;

        $paginaAnterior = $pgAtual - 1;
        $paginaProxima = $pgAtual + 1;

        if($paginaAnterior < 1){

            $paginaAnterior = "SE";

        }

        if($paginaProxima > ceil($paginaLimite)){

            $paginaProxima = "SE";

        }

        $retorno = [$paginaAnterior, $paginaProxima];

        return $retorno;

    }

    public function retorna_categorias(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM categoria ORDER BY id ASC") or die("Erro ao retornar categorias");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_nome_categoria_produto($id_produto){

        include 'conexao.class.php';

        if($id_produto == 0){

            $sql = mysqli_query($conn, "SELECT id FROM categoria ORDER BY RAND() LIMIT 5") or die("Erro ao retornar nome categoria");

        }else{

            $sql = mysqli_query($conn, "SELECT categoria.id AS id FROM categoria INNER JOIN categoria_produto ON categoria.id=categoria_produto.id_categoria WHERE categoria_produto.id_produtos=$id_produto LIMIT 5") or die("Erro ao retornar nome categoria");

        }
        
        $linha = mysqli_fetch_assoc($sql);

        $nome = $linha["id"];

        return $nome;

    }

    public function retorna_produtos_relacionados($id_categoria, $id_produto_atual){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos INNER JOIN categoria_produto ON produtos.id=categoria_produto.id_produtos WHERE categoria_produto.id_categoria=$id_categoria AND categoria_produto.id_produtos!=$id_produto_atual AND produtos.qtd_estoque > 0 AND produtos.estado='publicado-disponivel'") or die("Erro ao retornar produtos relacionados");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_produtos_promocionais(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM  produtos WHERE preco_promocao!='' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY id DESC LIMIT 16") or die("Erro ao retornar produtos promocionais");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_variacoes(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT nome FROM variacao_produtos") or die("Erro retorna_variacoes");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function retorna_op_variacoes($nome, $propriedade){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT $propriedade FROM variacao_produtos WHERE nome='$nome'") or die("Erro retorna_variacoes");
        $linha = mysqli_fetch_assoc($sql);

        $retorno = $linha["$propriedade"];

        return $retorno;

    }

    public function verifica_nome_produto(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM produtos WHERE nome='$this->nome' collate utf8_general_ci") or die("Erro verifica_nome_produto");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function retorna_produtos_adm($busca, $estado, $organizar){

        include 'conexao.class.php';

        if($busca != "SE"){

            $retirarTracoBusca = str_replace("-", " ", $busca);

        }

        if($busca == "SE" && $estado == "SE"){

            $sql = mysqli_query($conn, "SELECT * FROM produtos ORDER BY id $organizar") or die("Erro retorna_produtos_adm");

        }else if($busca != "SE" && $estado == "SE"){

            $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%{$retirarTracoBusca}%' collate utf8_general_ci ORDER BY id $organizar") or die("Erro retorna_produtos_adm");

        }else if($busca == "SE" && $estado != "SE"){

            $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='$estado' ORDER BY id $organizar") or die("Erro retorna_produtos_adm");

        }else if($busca != "SE" && $estado != "SE"){

            $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='$estado' AND nome LIKE '%{$retirarTracoBusca}%' collate utf8_general_ci ORDER BY id $organizar") or die("Erro retorna_produtos_adm");

        }

        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)){

            $array[] = $linha;

        }

        if($qtd < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function retorna_dados_produto_pelo_id(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE id=$this->id") or die("Erro retorna_dados_produto_pelo_id");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function retorna_dados_galeria(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM galeria WHERE id_produtos=$this->id ORDER BY id ASC") or die("Erro retorna_qtd_imagem_galeria");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        if($qtd > 0){

            $retorno = ["qtd" => $qtd, "dados" => $array];

        }else{

            $retorno = ["qtd" => $qtd, "dados" => false];

        }

        return $retorno;

    }

    public function retorna_variacao_complementar_pelo_id($id_variacao){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM variacao_produtos WHERE id=$id_variacao") or die("Erro retorna_variacao_complementar_pelo_id");
        $linha = mysqli_fetch_assoc($sql);

        $nome = $linha["nome"];
        $opcoes = $linha["opcoes"];
        $texto_cliente = $linha["texto_cliente"];

        $retorno = ["nome" => $nome, "opcoes" => $opcoes, "texto_cliente" => $texto_cliente];

        return $retorno;

    }

    public function retorna_categorias_pelo_id_do_produto(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM categoria INNER JOIN categoria_produto ON categoria.id=categoria_produto.id_categoria WHERE categoria_produto.id_produtos=$this->id ORDER BY categoria_produto.id ASC") or die("Erro retorna_categorias_pelo_id_do_produto");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        if($qtd < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function atualizar_produto($capa, $variacaoAdicional){

        include 'conexao.class.php';

        /* $sql = mysqli_query($conn, "INSERT INTO produtos (nome, foto, descricao, preco, qtd_estoque, estado, id_variacao_produto, variacao_padrao, qtd_caracteres, preco_promocao, tipo, peso, altura, largura, comprimento, dias_entrega) VALUES ('$this->nome', NULL, '$this->descricao', $this->preco, $this->qtd, '$this->estado', $variacaoAdicional, '$this->variacaoPadrao', $this->maximo_caracteres, $this->promocao, '$this->tipo', '$this->peso', '$this->altura', '$this->largura', '$this->comprimento', $this->dias_entrega)") or die("Erro ao cadastrar o produto"); */
        if($capa == 1){

            $sql = mysqli_query($conn, "UPDATE produtos SET nome='$this->nome', descricao='$this->descricao', preco=$this->preco, qtd_estoque=$this->qtd, estado='$this->estado', id_variacao_produto=$variacaoAdicional, variacao_padrao='$this->variacaoPadrao', qtd_caracteres=$this->maximo_caracteres, preco_promocao=$this->promocao, tipo='$this->tipo', peso='$this->peso', altura='$this->altura', largura='$this->largura', comprimento='$this->comprimento', dias_entrega=$this->dias_entrega WHERE id=$this->id") or die("Erro atualizar_produto");

        }else{

            $sql = mysqli_query($conn, "UPDATE produtos SET nome='$this->nome', foto=NULL, descricao='$this->descricao', preco=$this->preco, qtd_estoque=$this->qtd, estado='$this->estado', id_variacao_produto=$variacaoAdicional, variacao_padrao='$this->variacaoPadrao', qtd_caracteres=$this->maximo_caracteres, preco_promocao=$this->promocao, tipo='$this->tipo', peso='$this->peso', altura='$this->altura', largura='$this->largura', comprimento='$this->comprimento', dias_entrega=$this->dias_entrega WHERE id=$this->id") or die("Erro atualizar_produto");

        }

    }

    public function apagar_img_galeria_bd($caminho){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "DELETE FROM galeria WHERE caminho='$caminho'") or die("Erro apagar_img_galeria_bd");

    }

    public function zerar_produtos_categoria(){

        include 'conexao.class.php';
        
        $sql = mysqli_query($conn, "DELETE FROM categoria_produto WHERE id_produtos=$this->id") or die("Erro zerar_produtos_categoria");

    }

    public function verificar_se_existe_pedido_para_o_produto(){

        include 'conexao.class.php';
        
        $sql = mysqli_query($conn, "SELECT id FROM item_pedido WHERE id_produtos=$this->id") or die("Erro verificar_se_existe_pedido_para_o_produto");
        $qtd = mysqli_num_rows($sql);

        if($qtd > 0){

            return true;

        }else{

            return false;

        }

    }

    public function apagar_produto(){

        include 'conexao.class.php';
        
        $sql = mysqli_query($conn, "DELETE FROM produtos WHERE id=$this->id") or die("Erro apagar_produto");

        $sql2 = mysqli_query($conn, "DELETE FROM categoria_produto WHERE id_produtos=$this->id") or die("Erro apagar_produto");

        $sql3 = mysqli_query($conn, "DELETE FROM galeria WHERE id_produtos=$this->id") or die("Erro apagar_produto");

        $sql4 = mysqli_query($conn, "DELETE FROM sacola WHERE id_produto=$this->id") or die("Erro apagar_produto");

    }

    

}

?>