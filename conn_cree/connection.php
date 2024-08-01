<?php
$dsn="mysql:host=localhost;port:3306;charset:utf8mb4";
$username="root";
$password="";
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,];
try{
$pdo=new PDO($dsn,$username,$password,$options);
}catch(PDOException $err){
echo "Error connection : " . $err->getMessage().PHP_EOL;
}