<?php

include 'conexao.php';

// Get ID from URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL query to delete the professor
    $sql = "DELETE FROM professores WHERE id = ?";
    
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conexao->error);
    }

    $stmt->bind_param("i", $id); //Nota pessoal: bind como inteiro, indicado por "i"

    if ($stmt->execute()) {
        echo "Professor excluído com sucesso!";
        // Redirect back to the exclusion page
        header("Location: ../sources/excluir.php");
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close();

//Só quem vê essa mensagem é quem usa o CURL... Só um aluno overthinking sobre algo.
} else {
    echo "ID não fornecido.";
    header("Location: ../sources/excluir.php");
}

$conexao->close();
?>  