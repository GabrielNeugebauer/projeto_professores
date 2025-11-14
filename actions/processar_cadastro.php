<?php

include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$disciplina = $_POST['disciplina_lecionada'];

// Prepare query. 
$sql = "INSERT INTO professores (nome, email, disciplina_lecionada) VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param("sss", $nome, $email, $disciplina); //Nota pessoal: bind como string, indicado por "s". sss = 3 strings. Sdds do Node.js em backend rsrsrs
//Aliás, bind_param previne SQL Injection ;)

if ($stmt->execute()) {
    echo "Professor cadastrado com sucesso!";
    // Redirect to list page
    header("Location: ../sources/listar.php");
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conexao->close();

?>