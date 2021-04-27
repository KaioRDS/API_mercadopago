<?php
namespace Src\Class;
use Src\Class\Banco;
require_once  dirname(dirname(__DIR__)).'/vendor/autoload.php';
class Produto extends Banco{

    public function __construct(){
        parent::__construct();
    }

    public function adicionarProduto($descricao ,  $preco , $img_produto){
        $sql = "INSERT INTO produto (descricao , preco , img_produto) VALUES (:descricao, :preco , :img_produto )";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(':descricao' ,$descricao );
        $sql->bindValue(':preco' , $preco );
        $sql->bindValue(':img_produto' ,$img_produto);
        $sql->execute();
        
    }

    public function getProduto($idProduto = null){

        if($idProduto != NULL){
            $sql = "SELECT * FROM produto WHERE id = :id";
            $sql = $this->conn->prepare($sql);
            $sql->bindValue(':id' , $idProduto);
        }else{
            $sql = "SELECT * FROM produto";
            $sql = $this->conn->prepare($sql);
        }
        $sql->execute();
        
        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
        }
    }

}