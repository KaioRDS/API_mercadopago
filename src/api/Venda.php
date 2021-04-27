<?php
require_once  dirname(dirname(__DIR__)).'/vendor/autoload.php';
use Src\Class\Venda;



switch ($_POST['type']) {
    case 'checkOut':
        $return = array();
        $idProduto = $_POST['idProduto'];
        $venda = new Venda();
        $return['urlRetorno']  = $venda->CheckOut($idProduto);
        echo json_encode( $return);
        break;
}