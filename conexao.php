<?php

$host = "localhost";
$user = "admin";
$pass = "Luc@s180";
$dbname = "uniaotecnologia";
$port = 3306;

try {
    $conn = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $pass);
    //echo "<p class='alert alert-success'>Conexão com banco de dados realizada com sucesso!</p>";
} catch (\PDOException $err) {
    echo "<p class='alert alert-danger'>Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado " . $err->getMessage() . "</p>";
}