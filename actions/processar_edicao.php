<?php
include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$disciplina = $_POST['disciplina_lecionada'];

// Query de atualização
$sql = "UPDATE professores SET nome=?, email=?, disciplina_lecionada=? WHERE id=?";

$stmt = $conexao->prepare($sql);

if ($stmt === false) {
    die("Erro ao preparar: " . $conexao->error);
}

// "sssi": 3 strings (nome, email, disciplina) e 1 inteiro (id)
$stmt->bind_param("sssi", $nome, $email, $disciplina, $id);

if ($stmt->execute()) {
    header("Location: ../sources/editar.php");
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>