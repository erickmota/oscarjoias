<?php

class compra{

    public $idCliente;
    public $anelUnico;
    public $gravacaoAnelUnico;
    public $anelCasal;
    public $gravacaoAnelCasal;
    public $apenasAro;
    public $apenasGravacao;
    public $variacaoComplementar;
    public $quantidade;
    public $idProduto;

    public function adicionar_produto_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO sacola (id_produto, anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, quantidade, id_cliente) VALUES ($this->idProduto, '$this->anelUnico', '$this->gravacaoAnelUnico', '$this->anelCasal', '$this->gravacaoAnelCasal', '$this->apenasAro', '$this->apenasGravacao', '$this->variacaoComplementar', $this->quantidade, $this->idCliente)") or die("Erro add ao carrinho");
        
    }

    public function retorna_dados_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT produtos.foto AS foto, produtos.nome AS nome_produto, sacola.anel_unico AS anel_unico, sacola.gravacao_anel_unico AS gravacao_anel_unico, sacola.anel_casal AS anel_casal, sacola.gravacao_anel_casal AS gravacao_anel_casal, sacola.apenas_aro AS apenas_aro, sacola.apenas_gravacao AS apenas_gravacao, sacola.variacao_complementar AS variacao_complementar, produtos.qtd_estoque AS qtd_estoque, produtos.preco AS preco, sacola.quantidade AS qtd_pedido, sacola.id AS id_sacola FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente ORDER BY sacola.id ASC") or die("Erro ao retornar dados do carrinho");
        $qtd_sql = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)){

            $array[] = $linha;

        }

        if($qtd_sql < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function atualiza_qtd_produto_carrinho($id_sacola, $qtd){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE sacola SET quantidade=$qtd WHERE id=$id_sacola") or die("Erro ao atualizar qtd produto no carrinho");

    }

    public function apagar_produto_individual_carrinho($id_sacola){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "DELETE FROM sacola WHERE id=$id_sacola") or die("Erro ao apagar produto individual o carrinho");

    }

    public function limpar_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "DELETE FROM sacola WHERE id_cliente=$this->idCliente") or die("Erro ao limpar carrinho");

    }

    public function retorna_qtd_itens_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM sacola WHERE id_cliente=$this->idCliente") or die("Erro ao retornar qtd itens carrinho");
        $qtd_sql = mysqli_num_rows($sql);

        return $qtd_sql;

    }

    public function calcular_frete($sCepDestino, $nCdServico){

        /* http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=70002900&sCepDestino=04547000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3 */
        
        /* 04014 = sedex */
        /* 04510 = PAC */

        /* nCdEmpresa=08082650
        &sDsSenha=564321
        &sCdMaoPropria=n
        &sCdAvisoRecebimento=n

        &sCepOrigem=70002900
        &sCepDestino=04547000
        &nVlPeso=1
        &nCdFormato=1
        &nVlComprimento=20
        &nVlAltura=20
        &nVlLargura=20
        &nVlValorDeclarado=0
        &nCdServico=04510
        &nVlDiametro=0
        &StrRetorno=xml
        &nIndicaCalculo=3 */

        $nCdEmpresa="";
        $sDsSenha="";
        $sCdMaoPropria="n";
        $sCdAvisoRecebimento="n";

        $sCepOrigem="18066315";
        /* $sCepDestino="04547000"; */
        $nVlPeso="1";
        $nCdFormato="1";
        $nVlComprimento="20";
        $nVlAltura="20";
        $nVlLargura="20";
        $nVlValorDeclarado="0";
        /* $nCdServico="04510"; */
        $nVlDiametro="0";
        $StrRetorno="xml";
        $nIndicaCalculo="3";

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa={$nCdEmpresa}&sDsSenha={$sDsSenha}&sCepOrigem={$sCepOrigem}&sCepDestino={$sCepDestino}&nVlPeso={$nVlPeso}&nCdFormato={$nCdFormato}&nVlComprimento={$nVlComprimento}&nVlAltura={$nVlAltura}&nVlLargura={$nVlLargura}&sCdMaoPropria={$sCdMaoPropria}&nVlValorDeclarado={$nVlValorDeclarado}&sCdAvisoRecebimento={$sCdAvisoRecebimento}&nCdServico={$nCdServico}&nVlDiametro={$nVlDiametro}&StrRetorno={$StrRetorno}&nIndicaCalculo={$nIndicaCalculo}";

        $file = file_get_contents($url);
        $convert = simplexml_load_string($file);

        /* echo $convert->cServico->Valor; */
        
        $retorno = [$convert->cServico->Valor, $convert->cServico->PrazoEntrega, $convert->cServico->MsgErro];

        return $retorno;

    }

}

?>