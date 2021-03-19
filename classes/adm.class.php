<?php

class adm{

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function login(){

        include 'conexao.class.php';
    
        $senhaEncode = base64_encode($this->senha);
    
        $sql = mysqli_query($conn, "SELECT * FROM adm WHERE email='$this->email' and senha='$this->senha'");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)) {
        
            $nome = $linha["nome"];
            $id = $linha["id"];
        
        }
        
        if($qtd == 1){
    
            $idEncode = base64_encode($id);
            $emailEncode = base64_encode($this->email);

            setcookie("aiu_oj", $idEncode, time() + 7 * (24 * 3600), "/");
            setcookie("aeu_oj", $emailEncode, time() + 7 * (24 * 3600), "/");
            setcookie("asu_oj", $senhaEncode, time() + 7 * (24 * 3600), "/");
    
        }else{
    
            setcookie("aiu_oj", null, -1, "/");
            setcookie("aeu_oj", null, -1, "/");
            setcookie("asu_oj", null, -1, "/");
    
        }

        return $qtd;

    }

    public function deslogar(){
        
        setcookie("aiu_oj", null, -1, "/");
        setcookie("aeu_oj", null, -1, "/");
        setcookie("asu_oj", null, -1, "/");
        
    }

    public function verifica_existencia_adm($idUsuario, $emailUsuario, $senhaUsuario){

        include 'conexao.class.php';
        
        $idDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($idUsuario));
        $emailDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($emailUsuario));
        $senhaDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($senhaUsuario));
    
        $sql = mysqli_query($conn, "SELECT * FROM adm WHERE email='$emailDecode' AND senha='$senhaDecode' AND id='$idDecode'") or die("erro verifica_existencia_adm");;
        $qtd = mysqli_num_rows($sql);
    
        if($qtd < 1){

            return false;
    
        }else{
    
            return true;
    
        }
    
    }

}

?>