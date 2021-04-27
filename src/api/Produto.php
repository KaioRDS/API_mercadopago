<?php
require_once  dirname(dirname(__DIR__)).'/vendor/autoload.php';
use Src\Class\Produto;



switch ($_POST['type']) {
    case 'getProdutos':
        $return = array();
        $produto = new Produto();
        $return['produtos'] = $produto->getProduto();
        echo json_encode($return['produtos']);

        break;
}