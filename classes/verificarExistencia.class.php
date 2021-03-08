<?php

class verificarExistencia{

    public $tabela;
    public $comparador;
    public $comparar;

    public function verificarExisenciaProduto(){

        include 'conexao.class.php';

        $nomeSemTraco = str_replace("-", " ", $this->comparar);

        $sql = mysqli_query($conn, "SELECT * FROM $this->tabela WHERE $this->comparador='$nomeSemTraco' collate utf8_general_ci AND estado!='rascunho'") or die("Erro Verifica produto");
        $qtdSql = mysqli_num_rows($sql);

        if($qtdSql < 1){

            return false;

        }else{

            return true;

        }

    }

}

?>