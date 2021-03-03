<?php

class clientes{

    public $emailUsuario;
    public $senhaUsuario;
    public $idUsuario;
    public $nomeUsuario;

    public function login(){

        include 'conexao.class.php';
    
        $senhaEncode = base64_encode($this->senhaUsuario);
    
        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$this->emailUsuario' and senha='$this->senhaUsuario'"); /* Precisa mudar depois */
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)) {
        
            $nome = $linha["nome"];
            $id = $linha["id"];
            $estado = $linha["estado"];
        
        }
        
        if($qtd == 1){
    
            if($estado == "pendente"){
                    
                /* $novoEmail = base64_encode($this->email);
                
                die ("<script>window.location='../confirmacao/$novoEmail'</script>"); */
                
            }else{
    
                $idEncode = base64_encode($id);
                $emailEncode = base64_encode($this->emailUsuario);
    
                setcookie("iu_oj", $idEncode, time() + 7 * (24 * 3600), "/");
                setcookie("eu_oj", $emailEncode, time() + 7 * (24 * 3600), "/");
                setcookie("su_oj", $this->senhaUsuario, time() + 7 * (24 * 3600), "/");
    
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
    
        $idDecode = base64_decode($idUsuario);
        $emailDecode = base64_decode($emailUsuario);
    
        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$emailDecode' and senha='$senhaUsuario' and id='$idDecode'");
        $qtd = mysqli_num_rows($sql);
    
        if($qtd < 1){
    
            setcookie("iu_oj", null, -1, "/");
            setcookie("eu_oj", null, -1, "/");
            setcookie("su_oj", null, -1, "/");
    
            echo "<script>window.location=''</script>";
    
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

}

?>