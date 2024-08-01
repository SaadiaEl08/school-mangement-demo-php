<?php
require("connection.php");
try{
$sql="CREATE DATABASE IF NOT EXISTS MySql;";
$pdo->exec($sql);
}
catch(PDOException $err){
    echo "Error creation :".$err->getMessage().PHP_EOL;
}