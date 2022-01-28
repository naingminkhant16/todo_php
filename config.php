<?php
define("MYSQL_USER",'root');
define("MYSQL_PASSWORD","");
define("MYSQL_HOST","localhost:8080");
define("MYSQL_DATABASE",'todo');
$options=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
];

try{
    $pdo=new PDO("mysql:dbhost=". MYSQL_HOST.";dbname=".MYSQL_DATABASE ,MYSQL_USER,MYSQL_PASSWORD,$options);
}catch (PDOException $e){
    echo $e->getMessage();
}
// $statement=$pdo->query("SELECT * FROM todo");
// $res=$statement->fetchAll();
// var_dump($res);
