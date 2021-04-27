<?php
namespace Src\Class;
use Src\Class\Banco;
use Src\Class\Produto;
use  MercadoPago\Preference;
use  MercadoPago\Item;
use MercadoPago\SDK;
require_once  dirname(dirname(__DIR__)).'/vendor/autoload.php';
class Venda extends Banco{

    public $token;
    private $publicKey;

    public function __construct(){
        parent::__construct();

        $this->token = 'TEST-2717467652367003-042618-14ecdc07a39eb8cc0f7922c5c09c7b5e-317708420';
        $this->publicKey = 'APP_USR-0d5fb386-5cfa-4255-8545-c1c1b288625c';
        $mercadoPago = new SDK();
        $mercadoPago->setAccessToken($this->token);


    }
    public function CheckOut($idproduto){
     
        $produto = new Produto();
        $produto =  $produto-> getProduto($idproduto);
           
        // Cria um objeto de preferência
        $preference = new Preference();

        // Cria um item na preferência
        $item = new Item();
        $item->title = $produto[0]['descricao'];
        $item->quantity = 1;
        $item->unit_price = $produto[0]['preco'] . '.00';
        $preference->items = array($item);
        $preference->save();
        return $preference->sandbox_init_point;
        
    }

    

}