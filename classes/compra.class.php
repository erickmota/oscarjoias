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

        $sql = mysqli_query($conn, "SELECT produtos.foto AS foto, produtos.nome AS nome_produto, sacola.anel_unico AS anel_unico, sacola.gravacao_anel_unico AS gravacao_anel_unico, sacola.anel_casal AS anel_casal, sacola.gravacao_anel_casal AS gravacao_anel_casal, sacola.apenas_aro AS apenas_aro, sacola.apenas_gravacao AS apenas_gravacao, sacola.variacao_complementar AS variacao_complementar, produtos.qtd_estoque AS qtd_estoque, produtos.preco AS preco, sacola.quantidade AS qtd_pedido, sacola.id AS id_sacola, sacola.id_produto AS id_produto FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente ORDER BY sacola.id ASC") or die("Erro ao retornar dados do carrinho");
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

    public function pagseguro($produtos, $codReferencia){

        $data["token"] = "5CF4F8DF64774D95BA43EAAFF1E704F8";
        /* $data["token"] = "f518ba01-dc67-49ee-815d-ec60447e713b6d8e65be47c981d54911676cca79ea4abef3-5d78-4585-913f-bea31b930745"; */
        $data["email"] = "erick_fcsaopaulo@hotmail.com";
        $data["currency"] = "BRL";
        /* $data["shippingAddressRequired"] = "true"; */
        /* $data["shippingAddressStreet"] = "Rua Castilho Aribert Fazzio";
        $data["shippingAddressNumber"] = "355";
        $data["shippingAddressCity"] = "Sorocaba";
        $data["shippingAddressState"] = "SP";
        $data["shippingAddressCountry"] = "BRA";
        $data["shippingAddressPostalCode"] = intval("18066315");
        $data["shippingType"] = intval("1"); */
        $data["reference"] = $codReferencia;

        $i = 1;

        foreach($produtos as $arrProdutos[]){

            $data["itemId".$i] = $arrProdutos[$i - 1]["id_produtos"];
            $data["itemQuantity".$i] = $arrProdutos[$i - 1]["qtd"];
            $data["itemDescription".$i] = $arrProdutos[$i - 1]["nome"];
            $data["itemAmount".$i] = number_format($arrProdutos[$i - 1]["preco"], 2, ".", "");
            $data["itemWeight".$i] = "100";

            $i++;

        }

        /* $data["itemId1"] = "1";
        $data["itemQuantity1"] = "1";
        $data["itemDescription1"] = "Produto teste";
        $data["itemAmount1"] = "299.00"; */

        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
        /* $url = "https://ws.pagseguro.uol.com.br/v2/checkout"; */

        $data = http_build_query($data);

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $xml = curl_exec($curl);

        curl_close($curl);

        $xml = simplexml_load_string($xml);

        return $xml -> code;

        /* var_dump($xml); */

    }

    public function adicionar_nova_compra($idReferencia, $cidade, $estado, $bairro, $rua, $complemento, $numero, $cep, $dataHora, $statusEntrega){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO pedido (id, id_cliente, cidade_entrega, estado_entrega, bairro_entrega, rua_entrega, complemento_entrega, numero_entrega, cep_entrega, data_hora, status_entrega) VALUES ($idReferencia, $this->idCliente, '$cidade', '$estado', '$bairro', '$rua', '$complemento', $numero, '$cep', '$dataHora', '$statusEntrega')") or die("Erro cadastrar nova compra");

        $sql2 = mysqli_query($conn, "INSERT INTO item_pedido (id_produtos, id_pedido, anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, quantidade) SELECT id_produto, '$idReferencia', anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, quantidade FROM sacola WHERE id_cliente=$this->idCliente") or die("Erro ao cadastrar novos itens a compra");

    }

    public function retorna_pedidos_por_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM pedido WHERE id_cliente=$this->idCliente ORDER BY data_hora DESC") or die("Erro ao retornar pedidos de cliente");
        $cont = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)){

            $array[] = $linha;

        }

        if($cont < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function retornar_status_compra_pagseguro($referencia){

        $email = "erick_fcsaopaulo@hotmail.com";
        $token = "5CF4F8DF64774D95BA43EAAFF1E704F8";
        /* $token = "f518ba01-dc67-49ee-815d-ec60447e713b6d8e65be47c981d54911676cca79ea4abef3-5d78-4585-913f-bea31b930745"; */

        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email={$email}&token={$token}&reference={$referencia}";
        /* $url = "https://ws.pagseguro.uol.com.br/v2/transactions?email={$email}&token={$token}&reference={$referencia}"; */

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $xml = curl_exec($curl);

        $xml = simplexml_load_string($xml);

        /* var_dump($xml); */

        $result = $xml -> resultsInThisPage;

        if($result < 1){

            $valores = ["valor" => 0, "status" => 0];

            return $valores;

        }else{

            $valores = ["valor" => $xml -> transactions -> transaction -> grossAmount, "status" => $xml -> transactions -> transaction -> status];

            return $valores;

        }

        /* return $xml -> transactions -> transaction -> status; */

    }

    public function organizar_status_pagseguro($status){

        /* Método modelado de acordo com a documentação oficial do pagseguro */

        if($status == 0){

            return "Não finalizada";

        }else if($status == 1){

            return "Aguardando pagamento";

        }else if($status == 2){

            return "Em análise";

        }else if($status == 3){

            return "Paga";

        }else if($status == 4){

            return "Disponível";

        }else if($status == 5){

            return "Em disputa";

        }else if($status == 6){

            return "Devolvida";

        }else if($status == 7){

            return "Cancelada";

        }

    }

    public function apagar_pedido_e_item_pedido($referencia){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "DELETE FROM pedido WHERE id='$referencia'") or die("Erro ao excluir pedido");

        $sql2 = mysqli_query($conn, "DELETE FROM item_pedido WHERE id_pedido='$referencia'") or die("Erro ao excluir item pedido");

    }

    public function verifica_se_referencia_pertence_ao_cliente($referencia){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM pedido WHERE id='$referencia' AND id_cliente=$this->idCliente") or die("erro ao verificar se referencia pertence ao id");
        $qtd = mysqli_num_rows($sql);

        if($qtd < 1){

            return false;

        }else{

            return true;

        }

    }

    public function retorna_produtos_pedido($referencia){

        include 'conexao.class.php';

        /* $sql = mysqli_query($conn, "SELECT * FROM item_pedido INNER JOIN pedido ON item_pedido.id_pedido=pedido.id WHERE pedido.id='$referencia' ORDER BY item_pedido.id ASC") or die("Erro ao retornar produtos do pedido"); */
        $sql = mysqli_query($conn, "SELECT * FROM item_pedido INNER JOIN pedido ON item_pedido.id_pedido=pedido.id INNER JOIN produtos ON item_pedido.id_produtos=produtos.id WHERE pedido.id='$referencia' ORDER BY item_pedido.id ASC") or die("Erro ao retornar produtos do pedido");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_dados_pedido_por_referencia($referencia){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM pedido WHERE id='$referencia'") or die("Erro ao retornar dados por referencia");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;
            
        }

        return $array;

    }

}

?>