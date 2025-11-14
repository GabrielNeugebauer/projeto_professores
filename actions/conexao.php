<?php

$servidor = "localhost";
$usuario = "root"; 
$senha = "";       
$banco = "escola";

// Conexão com o banco de dados via MySQLi
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Check connection.
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>