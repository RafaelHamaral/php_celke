<?php

$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "celke";
$port = "3306";


try {
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "conexao com o banco de dados realizados com sucesso.";
} catch (PDOException $err){
    //echo "Erro: Conexao com o banco de dados NÃO realizado. Erro gerado " . $err->getMessage();
}

//Echo comentado porque os dados deverao ser enviados em formato de objetos. 