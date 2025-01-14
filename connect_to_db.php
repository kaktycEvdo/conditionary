<?php
$config = parse_ini_file('db.ini');
$mysql = null;
try{
    $mysql = new PDO("mysql:host=".$config['host'].";dbname=".$config['database'], $config['name'], $config['password']);
}
catch(PDOException $e){
    $message = $e->getMessage();
    ServerModal::staticThrowModal("Ошибка: $message", true);
}

/**
 * @var PDO $pdo Current PDO object. Change to other InnoDB SCBD when needed.
 */
$pdo = $mysql;