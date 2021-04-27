<?php
namespace Src\Class;
require_once  dirname(dirname(__DIR__)).'/vendor/autoload.php';
class Banco{

    protected $conn;

    public function __construct(){
        try{
            $this->conn = new \PDO('mysql:host=localhost;dbname=apimercadopago','root', '');
        }
        catch ( PDOException $e ){
                echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    


}