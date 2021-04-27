<?php
use Src\Class\Produto;
require dirname(dirname(__DIR__)).'/vendor/autoload.php';
$produto = new Produto();


if(isset($_POST['descricao']) && isset($_POST['preco'])){
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);

}
$imagem = $_FILES['imagem'];
$tipoImagem = explode('/', $imagem['type']);
$nomeArquivo = md5(time() . rand(0 , 99)) .'.'.$tipoImagem[1] ;

if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
    $produto->adicionarProduto($descricao ,  $preco , $nomeArquivo);
    move_uploaded_file($imagem['tmp_name'] , '../../assets/img/'. $nomeArquivo);

    
}

header('location:../../index.php');
