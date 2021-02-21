<?php

class produtos{

    public $nome;
    public $descricao;
    public $preco;
    public $qtd;
    public $estado;
    public $variacaoPadrao;
    public $maximo_caracteres;
    public $promocao;

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

        $sql = mysqli_query($conn, "INSERT INTO produtos (nome, foto, descricao, preco, qtd_estoque, estado, id_variacao_produto, variacao_padrao, qtd_caracteres, preco_promocao) VALUES ('$this->nome', NULL, '$this->descricao', $this->preco, $this->qtd, '$this->estado', $variacaoAdicional, '$this->variacaoPadrao', $this->maximo_caracteres, $this->promocao)") or die("Erro ao cadastrar o produto");

    }

    /* Retorna ultimo id de uma tabela */
    public function retorna_ultimo_id($tabela){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM $tabela ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
        $linha = mysqli_fetch_array($sql);

        return $linha["id"];

    }

    /* Cadastrar variações adicionais */
    public function cadastrar_variacao_personalizada($nomeVariacao, $opVariacao){

        include 'conexao.class.php';

        $tirarEspacos = str_replace(", ", ",", $opVariacao);
        $tirarEspacos2 = str_replace(", ", ",", $tirarEspacos);

        $sql = mysqli_query($conn, "INSERT INTO variacao_produtos (nome, opcoes) VALUES ('$nomeVariacao', '$tirarEspacos2')") or die("Erro variação personalizada");

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
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    /* Retorna lista de produtos para a loja */
    public function retorna_lsita_produtos(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos") or die("Erro retornar produtos para a loja");

    }

}

?>