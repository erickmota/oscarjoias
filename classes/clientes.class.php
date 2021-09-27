<?php

class clientes{

    public $emailUsuario;
    public $senhaUsuario;
    public $idUsuario;
    public $nomeUsuario;

    public function login(){

        include 'conexao.class.php';
    
        $senhaEncode = base64_encode($this->senhaUsuario);
    
        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$this->emailUsuario' and senha='$senhaEncode'");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)) {
        
            $nome = $linha["nome"];
            $id = $linha["id"];
            $estado = $linha["estado"];
        
        }
        
        if($qtd == 1){
    
            if($estado == "pendente"){
                
                die ("<script>window.location='../aviso-confirmar?e={$this->emailUsuario}'</script>");
                
            }else{
    
                $idEncode = base64_encode($id);
                $emailEncode = base64_encode($this->emailUsuario);
    
                setcookie("iu_oj", $idEncode, time() + 7 * (24 * 3600), "/");
                setcookie("eu_oj", $emailEncode, time() + 7 * (24 * 3600), "/");
                setcookie("su_oj", $senhaEncode, time() + 7 * (24 * 3600), "/");
                setcookie("cookies_oscar_joias", "aceitos", time() + 7 * (24 * 3600), "/");
    
            }
    
        }else{
    
            setcookie("iu_oj", null, -1, "/");
            setcookie("eu_oj", null, -1, "/");
            setcookie("su_oj", null, -1, "/");
    
        }

        return $qtd;
    
    }

    public function verificaExistenciaUsuario($idUsuario, $emailUsuario, $senhaUsuario){

        include 'conexao.class.php';
    
        $idDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($idUsuario)));
        $emailDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($emailUsuario)));
        $senhaDecode = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($senhaUsuario));

        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$emailDecode' AND senha='$senhaUsuario' AND id='$idDecode'") or die("<script>window.location='php/deslogar.php';</script>");;
        $qtd = mysqli_num_rows($sql);
    
        if($qtd < 1){

            return false;
    
        }else{
    
            return true;
    
        }
    
    }

    public function deslogar(){
        
        setcookie("iu_oj", null, -1, "/");
        setcookie("eu_oj", null, -1, "/");
        setcookie("su_oj", null, -1, "/");
        
    }

    public function cadastrar($estadoUsuario){

        include 'conexao.class.php';

        $senhaEncode = base64_encode($this->senhaUsuario);

        setcookie("cookies_oscar_joias", "aceitos", time() + 7 * (24 * 3600), "/");

        $sql = mysqli_query($conn, "INSERT INTO cliente (nome, email, senha, estado) VALUES ('$this->nomeUsuario', '$this->emailUsuario', '$senhaEncode', '$estadoUsuario')") or die("Erro ao cadastrar usuario");

    }

    public function verifica_existencia_email(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT email FROM cliente WHERE email='$this->emailUsuario'") or die("Erro ao verificar e-mail cliente");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function retorna_estado_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT estado FROM cliente WHERE email='$this->emailUsuario'") or die("Erro ao retornar estado do cliente");
        $linha = mysqli_fetch_assoc($sql);

        $estado = $linha["estado"];

        return $estado;

    }

    public function retorna_dado_individual_cliente($dado){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT $dado FROM cliente WHERE email='$this->emailUsuario'") or die("Erro ao retornar dado individual do cliente");
        $linha = mysqli_fetch_assoc($sql);

        $retorno = $linha[$dado];

        return $retorno;

    }

    public function mudar_status_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE cliente SET estado='confirmado' WHERE email='$this->emailUsuario'") or die("Erro ao mudar estado do cliente");

    }

    public function verifica_se_sacola_pertence_ao_cliente($idSacola, $idCliente){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM sacola WHERE id='$idSacola' AND id_cliente='$idCliente'") or die("Erro verifica_se_sacola_pertence_ao_cliente");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function verificar_se_numero_pedido_pertence_ao_cliente($idPedido, $idCliente){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM pedido WHERE id='$idPedido' AND id_cliente='$idCliente'") or die("Erro verificar_se_numero_pedido_pertence_ao_cliente");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function retornar_senha_por_email(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT nome, senha FROM cliente WHERE email='$this->emailUsuario'") or die("Erro retornar_senha_por_email");
        $qtd = mysqli_num_rows($sql);
        $linha = mysqli_fetch_assoc($sql);

        $nome = $linha["nome"];
        $senha = $linha["senha"];

        $retorno = ["nome" => $nome, "senha" => $senha];

        if($qtd < 1){

            return false;

        }else{

            return $retorno;

        }

    }

    public function retorna_dados_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$this->emailUsuario'") or die("Erro retorna_dados_cliente");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function atualiza_dado_individual_cliente($atributo, $novoDado){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE cliente SET $atributo='$novoDado' WHERE id=$this->idUsuario") or die("Erro atualiza_dado_individual_cliente");

    }

    public function verifica_se_senha_e_do_usuario(){

        include 'conexao.class.php';

        $senhaCompactada = base64_encode($this->senhaUsuario);

        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$this->emailUsuario' AND senha='$senhaCompactada'") or die("Erro verifica_se_senha_e_do_usuario");
        $qtd = mysqli_num_rows($sql);

        if($qtd < 1){

            return false;

        }else{

            return true;

        }

    }

}

?>