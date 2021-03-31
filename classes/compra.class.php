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
    public $variacaoComplementar2;
    public $variacaoComplementar3;
    public $quantidade;
    public $idProduto;

    public function adicionar_produto_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO sacola (id_produto, anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, variacao_complementar2, variacao_complementar3, quantidade, id_cliente) VALUES ($this->idProduto, '$this->anelUnico', '$this->gravacaoAnelUnico', '$this->anelCasal', '$this->gravacaoAnelCasal', '$this->apenasAro', '$this->apenasGravacao', '$this->variacaoComplementar', '$this->variacaoComplementar2', '$this->variacaoComplementar3', $this->quantidade, $this->idCliente)") or die("Erro add ao carrinho");
        
    }

    public function retorna_dados_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT produtos.foto AS foto, produtos.nome AS nome_produto, sacola.anel_unico AS anel_unico, sacola.gravacao_anel_unico AS gravacao_anel_unico, sacola.anel_casal AS anel_casal, sacola.gravacao_anel_casal AS gravacao_anel_casal, sacola.apenas_aro AS apenas_aro, sacola.apenas_gravacao AS apenas_gravacao, sacola.variacao_complementar AS variacao_complementar, sacola.variacao_complementar2 AS variacao_complementar2, sacola.variacao_complementar3 AS variacao_complementar3, produtos.qtd_estoque AS qtd_estoque, produtos.preco AS preco, sacola.quantidade AS qtd_pedido, sacola.id AS id_sacola, sacola.id_produto AS id_produto, produtos.estado AS estado, produtos.peso AS peso, produtos.largura AS largura, produtos.altura AS altura, produtos.comprimento AS comprimento, produtos.dias_entrega AS dias_entrega, produtos.id_variacao_produto AS id_variacao_produto, produtos.id_variacao_produto2 AS id_variacao_produto2, produtos.id_variacao_produto3 AS id_variacao_produto3 FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente ORDER BY sacola.id ASC") or die("Erro ao retornar dados do carrinho");
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

    public function retorna_dados_variacao_complementar_por_id($id_variacao){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT texto_cliente FROM variacao_produtos WHERE id=$id_variacao") or die("Erro retorna_variacao_complementar_por_id");
        $linha = mysqli_fetch_array($sql);

        return $linha["texto_cliente"];

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

    public function calcular_frete($sCepDestino, $peso, $altura, $largura, $comprimento, $nCdServico){

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

        $pesoString = strval($peso);
        $alturaString = strval($altura);
        $larguraString = strval($largura);
        $comprimentoString = strval($comprimento);

        $nCdEmpresa="";
        $sDsSenha="";
        $sCdMaoPropria="n";
        $sCdAvisoRecebimento="n";

        $sCepOrigem="18077370";
        /* $sCepDestino="04547000"; */
        /* $nVlPeso="1"; */
        $nCdFormato="1";
        /* $nVlComprimento="20"; */
        /* $nVlAltura="20"; */
        /* $nVlLargura="20"; */
        $nVlValorDeclarado="0";
        /* $nCdServico="04510"; */
        $nVlDiametro="0";
        $StrRetorno="xml";
        $nIndicaCalculo="3";

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa={$nCdEmpresa}&sDsSenha={$sDsSenha}&sCepOrigem={$sCepOrigem}&sCepDestino={$sCepDestino}&nVlPeso={$pesoString}&nCdFormato={$nCdFormato}&nVlComprimento={$comprimentoString}&nVlAltura={$alturaString}&nVlLargura={$larguraString}&sCdMaoPropria={$sCdMaoPropria}&nVlValorDeclarado={$nVlValorDeclarado}&sCdAvisoRecebimento={$sCdAvisoRecebimento}&nCdServico={$nCdServico}&nVlDiametro={$nVlDiametro}&StrRetorno={$StrRetorno}&nIndicaCalculo={$nIndicaCalculo}";
        /* $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=70002900&sCepDestino=04547000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3"; */

        $file = file_get_contents($url);
        $convert = simplexml_load_string($file);

        /* var_dump($convert); */

        /* echo $convert->cServico->Valor; */
        
        $retorno = [$convert->cServico->Valor, $convert->cServico->PrazoEntrega, $convert->cServico->MsgErro];

        return $retorno;

    }

    public function pagseguro($produtos, $codReferencia){

        /* $data["token"] = "5CF4F8DF64774D95BA43EAAFF1E704F8"; */
        /* $data["token"] = "f518ba01-dc67-49ee-815d-ec60447e713b6d8e65be47c981d54911676cca79ea4abef3-5d78-4585-913f-bea31b930745"; */
        $data["token"] = "6780316e-7722-43f5-ac22-5e9bfa93481f3ff214f2488eb24a82550eb8959a12225592-2416-41c3-8f62-d2a35e158a0a";
        /* $data["email"] = "erick_fcsaopaulo@hotmail.com"; */
        $data["email"] = "oscarmgablu@hotmail.com";
        $data["currency"] = "BRL";
        $data["shippingAddressRequired"] = "false";
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

        /* $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout"; */
        $url = "https://ws.pagseguro.uol.com.br/v2/checkout";

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

    public function adicionar_nova_compra($idReferencia, $cidade, $estado, $bairro, $rua, $complemento, $numero, $cep, $dataHora, $statusEntrega, $detalhes, $cpf, $celular){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO pedido (id, id_cliente, cidade_entrega, estado_entrega, bairro_entrega, rua_entrega, complemento_entrega, numero_entrega, cep_entrega, data_hora, status_entrega, detalhes_entrega, cpf, celular) VALUES ($idReferencia, $this->idCliente, '$cidade', '$estado', '$bairro', '$rua', '$complemento', $numero, '$cep', '$dataHora', '$statusEntrega', '$detalhes', '$cpf', '$celular')") or die("Erro cadastrar nova compra");

        /* $sql2 = mysqli_query($conn, "INSERT INTO item_pedido (id_produtos, id_pedido, anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, quantidade) SELECT id_produto, '$idReferencia', anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, quantidade FROM sacola WHERE id_cliente=$this->idCliente") or die("Erro ao cadastrar novos itens a compra"); */

        $sql2 = mysqli_query($conn, "SELECT * FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente") or die("Erro puxar os dados da sacola");
        while($linha = mysqli_fetch_assoc($sql2)){

            $idProduto = $linha["id_produto"];
            $anelUnico = $linha["anel_unico"];
            $gravacaoAnelUnico = $linha["gravacao_anel_unico"];
            $anelCasal = $linha["anel_casal"];
            $gravacaoAnelCasal = $linha["gravacao_anel_casal"];
            $apenasAro = $linha["apenas_aro"];
            $apenasGravacao = $linha["apenas_gravacao"];
            $variacaoComplementar = $linha["variacao_complementar"];
            $variacaoComplementar2 = $linha["variacao_complementar2"];
            $variacaoComplementar3 = $linha["variacao_complementar3"];
            $quantidade = $linha["quantidade"];
            $preco = $linha["preco"];

            $sql7 = mysqli_query($conn, "INSERT INTO item_pedido (id_produtos, id_pedido, anel_unico, gravacao_anel_unico, anel_casal, gravacao_anel_casal, apenas_aro, apenas_gravacao, variacao_complementar, variacao_complementar2, variacao_complementar3, quantidade, preco_produto_pedido) VALUES ('$idProduto', '$idReferencia', '$anelUnico', '$gravacaoAnelUnico', '$anelCasal', '$gravacaoAnelCasal', '$apenasAro', '$apenasGravacao', '$variacaoComplementar', '$variacaoComplementar2', '$variacaoComplementar3', '$quantidade', '$preco')") or die("Erro ao add produtos");

        }

        /* -1 produto no estoque */

        $sql3 = mysqli_query($conn, "SELECT id FROM pedido WHERE id_cliente=$this->idCliente ORDER BY data_hora DESC LIMIT 1") or die("Erro ao remover produto do estoque");
        $linha3 = mysqli_fetch_assoc($sql3);

        $id_pedido = $linha3["id"];

        $sql4 = mysqli_query($conn, "SELECT * FROM item_pedido WHERE id_pedido=$id_pedido") or die("Erro ao obter os produtos do pedido");
        while($linha4 = mysqli_fetch_assoc($sql4)){

            $id_produto = $linha4["id_produtos"];
            $qtd_produto = $linha4["quantidade"];

            $sql5 = mysqli_query($conn, "SELECT qtd_estoque FROM produtos WHERE id=$id_produto") or die("Erro ao buscar produto");
            $linha5 = mysqli_fetch_assoc($sql5);

            $novaQtd = $linha5["qtd_estoque"] - $qtd_produto;

            $sql6 = mysqli_query($conn, "UPDATE produtos SET qtd_estoque=$novaQtd WHERE id=$id_produto") or die("erro nova quantidade");

        }

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

        /* $email = "erick_fcsaopaulo@hotmail.com"; */
        $email = "oscarmgablu@hotmail.com";
        /* $token = "5CF4F8DF64774D95BA43EAAFF1E704F8"; */
        /* $token = "f518ba01-dc67-49ee-815d-ec60447e713b6d8e65be47c981d54911676cca79ea4abef3-5d78-4585-913f-bea31b930745"; */
        $token = "6780316e-7722-43f5-ac22-5e9bfa93481f3ff214f2488eb24a82550eb8959a12225592-2416-41c3-8f62-d2a35e158a0a";

        /* $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email={$email}&token={$token}&reference={$referencia}"; */
        $url = "https://ws.pagseguro.uol.com.br/v2/transactions?email={$email}&token={$token}&reference={$referencia}";

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

        /* +1 nos produtos */

        $sql4 = mysqli_query($conn, "SELECT * FROM item_pedido WHERE id_pedido=$referencia") or die("Erro ao obter os produtos do pedido");
        while($linha4 = mysqli_fetch_assoc($sql4)){

            $id_produto = $linha4["id_produtos"];
            $qtd_produto = $linha4["quantidade"];

            $sql5 = mysqli_query($conn, "SELECT qtd_estoque FROM produtos WHERE id=$id_produto") or die("Erro ao buscar produto");
            $linha5 = mysqli_fetch_assoc($sql5);

            $novaQtd = $linha5["qtd_estoque"] + $qtd_produto;

            $sql6 = mysqli_query($conn, "UPDATE produtos SET qtd_estoque=$novaQtd WHERE id=$id_produto") or die("erro nova quantidade");

        }

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
        $sql = mysqli_query($conn, "SELECT * FROM item_pedido INNER JOIN pedido ON item_pedido.id_pedido=pedido.id INNER JOIN produtos ON item_pedido.id_produtos=produtos.id WHERE pedido.id='$referencia' ORDER BY item_pedido.id DESC") or die("Erro ao retornar produtos do pedido");
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

    public function comparar_qtd_carrinho_qtd_produto($idProduto){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT produtos.qtd_estoque AS qtd_estoque, sacola.quantidade AS quantidade, sacola.id AS id_sacola FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente AND sacola.id_produto=$idProduto") or die("Erro comparar_qtd_carrinho_qtd_produto");
        $linha = mysqli_fetch_assoc($sql);

        $qtd_estoque = $linha["qtd_estoque"];
        $qtd_carrinho = $linha["quantidade"];
        $id_sacola = $linha["id_sacola"];

        if($qtd_carrinho > $qtd_estoque && $qtd_estoque > 0){

            $sql2 = mysqli_query($conn, "UPDATE sacola SET quantidade=$qtd_estoque WHERE id=$id_sacola") or die("Erro ao atualizar qtd produto carrinho");

            echo "<script>window.alert('Um ou mais itens na sua sacola tiveram a quantidade diminuída devido a alterações em nosso estoque, por favor, confira antes de finalizar o pedido!'); window.location='sacola'</script>";

        }

    }

    public function retorna_pedido_adm($busca){

        include 'conexao.class.php';

        if($busca == "SE"){

            $sql = mysqli_query($conn, "SELECT pedido.id AS id_pedido, pedido.id_cliente AS id_cliente, pedido.data_hora AS data_hora, pedido.status_entrega AS status_entrega, cliente.id AS id_cliente, cliente.nome AS nome FROM pedido INNER JOIN cliente ON pedido.id_cliente=cliente.id ORDER BY pedido.data_hora DESC") or die("Erro retorna_pedido_adm");

        }else{

            $sql = mysqli_query($conn, "SELECT pedido.id AS id_pedido, pedido.id_cliente AS id_cliente, pedido.data_hora AS data_hora, pedido.status_entrega AS status_entrega, cliente.id AS id_cliente, cliente.nome AS nome FROM pedido INNER JOIN cliente ON pedido.id_cliente=cliente.id WHERE pedido.id LIKE '%$busca%' OR cliente.nome LIKE '%$busca%' collate utf8_general_ci ORDER BY pedido.data_hora DESC") or die("Erro retorna_pedido_adm");

        }

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

    public function alterar_status_entrega($status, $idPedido){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE pedido SET status_entrega='$status' WHERE id=$idPedido") or die("Erro alterar_status_entrega");

    }

}

?>