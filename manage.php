<?php
include_once 'connect_to_db.php';
if(!isset($_GET['item']) || $_GET['item'] == ''){
    echo 'error';
    die;
}
$need = $_GET['item'];
$command = $_GET['command'];

$data = 'a';

switch($need){
    case 'products':{
        if($command == 'getAll'){
            $q = $pdo->query("SELECT * FROM product");
            $data = $q->fetchAll();
        }
        break;
    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);